<?php

namespace App\Http\Controllers\Anggaran;

use App\Enums\Anggaran\StatusRkaPdEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Anggaran\RkaPdRequest;
use App\Models\Anggaran\RkaPd;
use App\Models\Setup\SubUnitKerja;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RkaPdController extends Controller
{
    public function __construct(
        SubUnitKerja $sub_unit_kerja,
        RkaPd $rka_pd
    ) {
        $this->sub_unit_kerja = $sub_unit_kerja;
        $this->rka_pd = $rka_pd;
    }

    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) :

            $data = $this->rka_pd
                ->with('belanja_rka_pd')
                ->whereHas('sub_unit_kerja', function ($q) use ($request) {
                    $q->when($request->filled('sub_unit_kerja_id'), function ($q) use ($request) {
                        $q->where('id', $request->sub_unit_kerja_id);
                    });
                })
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Sub Unit Kerja" href="{{ route("rka-pd.edit", $id) }}" class="dropdown-item">Edit</a><a data-action="delete" href="{{ route("rka-pd.destroy", $id) }}" class="dropdown-item text-danger">Hapus</a></div></div>')
                ->editColumn('status', function ($i) {
                    switch ($i->status) {
                        case StatusRkaPdEnum::Murni:
                            return '<span class="badge badge-primary">Murni</span>';
                            break;
                        case StatusRkaPdEnum::Pergeseran:
                            return '<span class="badge badge-info">Pergeseran</span>';
                            break;
                        case StatusRkaPdEnum::Perubahan:
                            return '<span class="badge badge-success">Perubahan</span>';
                            break;
                        case StatusRkaPdEnum::AmbangBatas:
                            return '<span class="badge badge-warning">Ambang Batas</span>';
                            break;
                        default:
                            return '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                })
                ->editColumn('pagu_pengeluaran', function ($i) {
                    return $i->belanja_rka_pd->sum('nilai');
                })
                ->rawColumns(['action', 'status'])
                ->toJson();

        else :

            $table = $builder->ajax([
                'url' => route('rka-pd.index'),
                'data' => 'function(d) {
                d.sub_unit_kerja_id = $("select[name=\'sub_unit_kerja_id_filter\']").val();
            }',
            ])
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center', 'orderable' => false])
                ->addColumn(['data' => 'sub_unit_kerja.nama', 'title' => 'Nama SKPD'])
                ->addColumn(['data' => 'nomor', 'title' => 'Nomor Dokumen', 'class' => 'text-center'])
                ->addColumn(['data' => 'tanggal', 'title' => 'Tanggal Dokumen', 'class' => 'text-center'])
                ->addColumn(['data' => 'uraian', 'title' => 'Uraian Dokumen RKA'])
                ->addColumn(['data' => 'pagu_pendapatan', 'title' => 'Pendapatan', 'class' => 'text-right'])
                ->addColumn(['data' => 'pagu_pengeluaran', 'title' => 'Belanja', 'class' => 'text-right'])
                ->addColumn(['data' => 'pagu_pembiayaan', 'title' => 'Pembiayaan', 'class' => 'text-right'])
                ->addColumn(['data' => 'status', 'title' => 'Status RKA', 'class' => 'text-center'])
                ->parameters([
                    "initComplete" => "function(settings, json) {
                    //menambah rowspan ke kolom yg tidak digeser
                    $('#rka-pd-table thead tr:nth-child(1) th').filter(':nth-child(1),:nth-child(2),:nth-child(3),:nth-child(4),:nth-child(5),:nth-child(6),:nth-child(10)').attr('rowspan', '2');
                    //menambah tr baru setelah tr lama
                    $('#rka-pd-table thead').append('<tr role=\"row\"></tr>');
                    //menggeser kolom yg tidak dirowspan ke tr baru
                    $('#rka-pd-table thead tr:nth-child(1) th').filter(':nth-child(7),:nth-child(8),:nth-child(9)').prependTo('#rka-pd-table thead tr:nth-child(2)');
                    //menambah kolom colspan ke tr lama
                    $('<th colspan=\"3\" class=\"text-center align-middle\">Pagu Anggaran</th>').insertAfter('#rka-pd-table thead tr:nth-child(1) th:nth-child(6)');
                }",
                    'order' => [
                        2, 'asc'
                    ],
                    'columnDefs' => [
                        [
                            'targets' => [4],
                            'render' => '$.fn.dataTable.render.moment("DD/MM/YYYY")'
                        ],
                        [
                            'targets' => [6, 7, 8],
                            'render' => '$.fn.dataTable.render.number(".", ",", 2, "")'
                        ],
                    ]
                ]);

            return view('pages.anggaran.rka-pd.index', [
                'table' => $table,
                'sub_unit_kerja' => $this->sub_unit_kerja->get()
            ]);

        endif;
    }

    public function create()
    {
        return view('pages.anggaran.rka-pd.create', [
            'sub_unit_kerja' => $this->sub_unit_kerja->get(),
            'status' => StatusRkaPdEnum::cases()
        ]);
    }

    public function store(RkaPdRequest $request)
    {
        $this->rka_pd->create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RkaPd $rka_pd)
    {
        return view('pages.anggaran.rka-pd.edit', [
            'rka_pd' => $rka_pd,
            'sub_unit_kerja' => $this->sub_unit_kerja->get(),
            'status' => StatusRkaPdEnum::cases()
        ]);
    }

    public function update(RkaPd $rka_pd, RkaPdRequest $request)
    {
        $rka_pd->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RkaPd $rka_pd)
    {
        $rka_pd->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
