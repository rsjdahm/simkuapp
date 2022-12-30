<?php

namespace App\Http\Controllers\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
use App\Enums\Penatausahaan\StatusPendingBuktiGu;
use App\Enums\Penatausahaan\StatusPotonganBuktiGu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Penatausahaan\BuktiGuRequest;
use App\Models\Penatausahaan\Bank;
use App\Models\Penatausahaan\BuktiGu;
use App\Models\Setup\RekAkun;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BuktiGuController extends Controller
{
    public function __construct(RekAkun $rek_akun)
    {
        $this->rek_akun = $rek_akun;
    }
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) :

            // $data = BuktiGu::withSum(['potongan_bukti_gu' => function ($q) {
            //     return $q->where('status', StatusPotonganBuktiGu::Setor);
            // }], 'nilai')
            $data = BuktiGu::withSum('potongan_bukti_gu', 'nilai')
                ->withCount('potongan_bukti_gu')
                ->when($request->status_pending, function ($q) use ($request) {
                    return $q->where('status_pending', $request->status_pending);
                })
                ->when($request->bulan, function ($q) use ($request) {
                    return $q->whereMonth('tanggal', $request->bulan);
                })

                ->get();

            return DataTables::of($data)
                ->with('bukti_gu_normal_count', function () {
                    return BuktiGu::where('status_pending', StatusPendingBuktiGu::Normal)->count();
                })
                ->with('bukti_gu_pending_count', function () {
                    return BuktiGu::where('status_pending', StatusPendingBuktiGu::Pending)->count();
                })
                ->with('sum_nilai', $data->sum(function ($i) {
                    return $i->nilai;
                }))
                ->with('sum_nilai_potongan', $data->sum(function ($i) {
                    return $i->potongan_bukti_gu_sum_nilai;
                }))
                ->addIndexColumn()
                ->addColumn('action', function ($i) {
                    if ($i->status == StatusBuktiGu::BelumPosting) :
                        return '<div class="btn-group btn-group-sm" role="group"><button type="button" title="Aksi" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Bukti GU" href="' . route("bukti-gu.edit", $i->id) . '" class="dropdown-item">Edit</a><a data-action="delete" href="' . route("bukti-gu.destroy", $i->id) . '" class="dropdown-item text-danger">Hapus</a></div></div>';
                    endif;
                })
                ->addColumn('action2', function ($i) {
                    $action = '<div class="btn-group btn-group-sm" role="group"><button type="button" title="Tambah Data Pendukung" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus"></i></button><div class="dropdown-menu"><a data-load="modal" title="Potongan pada Bukti GU Nomor: ' . $i->nomor . '" href="' . route('potongan-bukti-gu.index', ['bukti_gu_id' => $i->id]) . '" class="dropdown-item">Potongan (' . $i->potongan_bukti_gu_count . ')</a></div></div>';

                    // if ($i->status == StatusBuktiGu::Posting) :
                    $action .= '<div class="btn-group btn-group-sm ml-1" role="group"><button type="button" title="Cetak Dokumen" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-print"></i></button><div class="dropdown-menu">
                        <a data-load="modal-pdf" title="Cetak Surat Bukti Pengeluaran/Belanja Bukti GU Nomor: ' . $i->nomor . '" href="' . route("bukti-gu.pdf-sbpb", $i->id) . '" class="dropdown-item">SBPB</a>
                        <a data-load="modal-pdf" title="Cetak Kwitansi Bukti GU Nomor: ' . $i->nomor . '" href="' . route("bukti-gu.pdf-kwitansi", $i->id) . '" class="dropdown-item">Kwitansi</a>
                        </div></div>';
                    // endif;
                    return $action;
                })
                ->editColumn('uraian', function ($i) {
                    return '<div class="border-bottom mb-1"><small><strong>' . $i->belanja_rka_pd->rek_sub_rincian_objek->kode_lengkap_nama . '</strong> - <i>' . $i->belanja_rka_pd->uraian . '</i></small></div>' . $i->uraian;
                })
                ->addColumn('rek_sub_rincian_objek', function ($i) {
                    return '[' . $i->belanja_rka_pd->rek_sub_rincian_objek->kode_lengkap . '] ' . $i->belanja_rka_pd->rek_sub_rincian_objek->nama;
                })
                ->editColumn('jenis', function ($i) {
                    switch ($i->jenis) {
                        case JenisBuktiGu::PihakKetiga:
                            return '<span class="badge badge-primary">' . JenisBuktiGu::PihakKetiga->value . '</span>';
                            break;
                        case JenisBuktiGu::Pegawai:
                            return '<span class="badge badge-info">' . JenisBuktiGu::Pegawai->value . '</span>';
                            break;
                        default:
                            return '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                })
                ->editColumn('metode_pembayaran', function ($i) {
                    switch ($i->metode_pembayaran) {
                        case MetodePembayaran::Tunai:
                            return '<span class="badge badge-success">' . MetodePembayaran::Tunai->value . '</span>';
                            break;
                        case MetodePembayaran::Transfer:
                            return '<span class="badge badge-danger">' . MetodePembayaran::Transfer->value . '</span>';
                            break;
                        default:
                            return '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                })
                ->editColumn('status', function ($i) {
                    switch ($i->status) {
                        case StatusBuktiGu::Posting:
                            $badge = '<span class="badge badge-success">' . StatusBuktiGu::Posting->value . '</span>';
                            break;
                        case StatusBuktiGu::BelumPosting:
                            $badge = '<span class="badge badge-warning">' . StatusBuktiGu::BelumPosting->value . '</span>';
                            break;
                        default:
                            $badge = '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                    return $badge;
                })
                ->editColumn('status_pending', function ($i) {
                    switch ($i->status_pending) {
                        case StatusPendingBuktiGu::Pending:
                            $badge = '<span class="badge badge-warning">' . StatusPendingBuktiGu::Pending->value . '</span>';
                            break;
                        case StatusPendingBuktiGu::Normal:
                            $badge = '<span class="badge badge-success">' . StatusPendingBuktiGu::Normal->value . '</span>';
                            break;
                        default:
                            $badge = '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                    return $badge;
                })
                ->rawColumns(['action', 'jenis', 'status', 'status_pending', 'metode_pembayaran', 'action2', 'uraian'])
                ->toJson();
        else :

            $table = $builder->ajax([
                'url' => route('bukti-gu.index'),
                'data' => 'function(d) {
                    d.status_pending = $("[name=\'status_pending_filter_table_bukti-gu\']:checked").val();
                    d.bulan = $("[name=\'bulan_filter_table_bukti-gu\']").val();
                }',
            ])
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addColumn(['data' => 'status_pending', 'title' => 'Status Pending', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'tanggal', 'title' => 'Tanggal', 'class' => 'text-center', 'defaultContent' => '-'])
                ->addColumn(['data' => 'nomor', 'title' => 'Nomor Bukti Pengeluaran', 'class' => 'text-center font-weight-bold', 'style' => 'width: 1%;', 'defaultContent' => '-'])
                ->addColumn(['data' => 'jenis', 'title' => 'Jenis Penerima', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'uraian', 'title' => 'Uraian'])
                ->addColumn(['data' => 'metode_pembayaran', 'title' => 'Metode Pembayaran', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nilai', 'title' => 'Nilai Belanja', 'class' => 'text-right'])
                ->addColumn(['data' => 'potongan_bukti_gu_sum_nilai', 'title' => 'Nilai Potongan', 'class' => 'text-right', 'defaultContent' => '-'])
                ->addAction(['data' => 'action2', 'title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
                ->addColumn(['data' => 'status', 'title' => 'Status', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->parameters([
                    'order' => [
                        3, 'desc'
                    ],
                    'columnDefs' => [
                        [
                            'targets' => [7, 8],
                            'render' => '$.fn.dataTable.render.number(".", ",", 2, "")'
                        ],
                        [
                            'targets' => [2],
                            'render' => 'function (data) {
                                if (data) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            }'
                        ],
                    ],
                    "drawCallback" => "function (row, data, start, end, display) {
                        var api = this.api();
                        var json = api.ajax.json();

                        $('[name$=\"_filter_table_bukti-gu\"][value=\"" . StatusPendingBuktiGu::Normal->value . "\"]').siblings('strong').html('<span class=\"text-white ml-2 px-3 rounded bg-success\">' + json.bukti_gu_normal_count + '</span>');
                        $('[name$=\"_filter_table_bukti-gu\"][value=\"" . StatusPendingBuktiGu::Pending->value . "\"]').siblings('strong').html('<span class=\"text-white ml-2 px-3 rounded bg-warning\">' + json.bukti_gu_pending_count + '</span>');
                    }",
                    "footerCallback" => "function (row, data, start, end, display) {
                        var api = this.api();
                        var json = api.ajax.json();

                        $(api.column(0).footer()).remove();
                        $(api.column(1).footer()).remove();
                        $(api.column(2).footer()).remove();
                        $(api.column(3).footer()).remove();
                        $(api.column(4).footer()).remove();
                        $(api.column(5).footer()).remove();
                        $(api.column(6).footer()).removeClass('text-center').attr('colspan', '7').html('Total Nilai Potongan').parent().addClass('bg-primary text-white');
                        $(api.column(7).footer()).html(json.sum_nilai.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        $(api.column(8).footer()).html(json.sum_nilai_potongan.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }",
                ]);

            return view('pages.penatausahaan.bukti-gu.index', [
                'table' => $table
            ]);

        endif;
    }

    public function create()
    {
        return view('pages.penatausahaan.bukti-gu.create', [
            'rek_akun' => $this->rek_akun->belanja()->with([
                'rek_kelompok',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek.belanja_rka_pd',
                'rek_kelompok.rek_jenis',
                'rek_kelompok.rek_jenis.rek_objek',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek',
            ])
                ->has('rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek.belanja_rka_pd')
                ->get(),
            'bank' => Bank::get()
        ]);
    }

    public function store(BuktiGuRequest $request)
    {
        BuktiGu::create($request->validated());

        return response()->json(['message' => 'Bukti Transaksi GU berhasil ditambah.']);
    }

    public function edit(BuktiGu $bukti_gu)
    {
        return view('pages.penatausahaan.bukti-gu.edit', [
            'bukti_gu' => $bukti_gu,
            'rek_akun' => $this->rek_akun->belanja()->with([
                'rek_kelompok',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek.belanja_rka_pd',
                'rek_kelompok.rek_jenis',
                'rek_kelompok.rek_jenis.rek_objek',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek',
                'rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek',
            ])
                ->has('rek_kelompok.rek_jenis.rek_objek.rek_rincian_objek.rek_sub_rincian_objek.belanja_rka_pd')
                ->get(),
            'bank' => Bank::get()
        ]);
    }

    public function update(BuktiGu $bukti_gu, BuktiGuRequest $request)
    {
        $bukti_gu->update($request->validated());

        return response()->json(['message' => 'Bukti Transaksi GU berhasil diubah.']);
    }

    public function destroy(BuktiGu $bukti_gu)
    {
        $bukti_gu->delete();

        return response()->json(['message' => 'Bukti Transaksi GU berhasil dihapus.']);
    }

    public function printPdfSbpb(BuktiGu $bukti_gu)
    {

        return Pdf::loadView('pages.penatausahaan.bukti-gu.pdf-sbpb', compact(
            'bukti_gu',
        ))
            ->setPaper('a4', 'potrait')
            ->stream('SBPB.pdf');
    }

    public function printPdfKwitansi(BuktiGu $bukti_gu)
    {

        return Pdf::loadView('pages.penatausahaan.bukti-gu.pdf-kwitansi', compact(
            'bukti_gu',
        ))
            ->setPaper('a4', 'potrait')
            ->stream('Kwitansi.pdf');
    }
}
