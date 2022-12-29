<?php

namespace App\Http\Controllers\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Penatausahaan\BuktiGuRequest;
use App\Models\Anggaran\BelanjaRkaPd;
use App\Models\Penatausahaan\Bank;
use App\Models\Penatausahaan\BuktiGu;
use App\Models\Setup\RekAkun;
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

            $data = BuktiGu::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" title="Aksi" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Bukti GU" href="{{ route("bukti-gu.edit", $id) }}" class="dropdown-item">Edit</a><a data-action="delete" href="{{ route("bukti-gu.destroy", $id) }}" class="dropdown-item text-danger">Hapus</a></div></div>')
                ->addColumn('action2', '<div class="btn-group btn-group-sm" role="group"><button type="button" title="Tambah Data Pendukung" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus"></i></button><div class="dropdown-menu"><a data-load="modal" title="Tambah Potongan pada Bukti GU" href="{{ route("bukti-gu.edit", $id) }}" class="dropdown-item">Tambah Potongan</a></div></div>')
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
                            return '<span class="badge badge-success">' . StatusBuktiGu::Posting->value . '</span>';
                            break;
                        case StatusBuktiGu::BelumPosting:
                            return '<span class="badge badge-warning">' . StatusBuktiGu::BelumPosting->value . '</span>';
                            break;
                        default:
                            return '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                })
                ->rawColumns(['action', 'jenis', 'status', 'metode_pembayaran', 'action2', 'uraian'])
                ->toJson();
        else :

            $table = $builder->ajax(route('bukti-gu.index'))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addColumn(['data' => 'tanggal', 'title' => 'Tanggal', 'class' => 'text-center'])
                ->addColumn(['data' => 'nomor', 'title' => 'Nomor Bukti Pengeluaran', 'class' => 'text-center font-weight-bold', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'jenis', 'title' => 'Jenis Penerima', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'uraian', 'title' => 'Uraian'])
                ->addAction(['data' => 'action2', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addColumn(['data' => 'nilai', 'title' => 'Nilai Belanja', 'class' => 'text-right'])
                ->addColumn(['data' => 'metode_pembayaran', 'title' => 'Metode Pembayaran', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'status', 'title' => 'Status Bukti Pengeluaran', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->parameters([
                    'order' => [
                        2, 'desc'
                    ],
                    'columnDefs' => [
                        [
                            'targets' => [6],
                            'render' => '$.fn.dataTable.render.number(".", ",", 2, "")'
                        ],
                        [
                            'targets' => [1],
                            'render' => '$.fn.dataTable.render.moment("DD/MM/YYYY")'
                        ],
                    ],
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
}
