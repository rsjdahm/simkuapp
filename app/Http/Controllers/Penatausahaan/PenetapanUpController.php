<?php

namespace App\Http\Controllers\Penatausahaan;

use App\Enums\Penatausahaan\StatusPosting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Penatausahaan\PenetapanUpRequest;
use App\Models\Penatausahaan\PenetapanUp;
use App\Models\Setup\RekSubRincianObjek;
use App\Models\Setup\SubUnitKerja;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PenetapanUpController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) :

            $data = PenetapanUp::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Penetapan UP" href="{{ route("penetapan-up.edit", $id) }}" class="dropdown-item">Edit</a><a data-action="delete" href="{{ route("penetapan-up.destroy", $id) }}" class="dropdown-item text-danger">Hapus</a></div></div>')
                ->addColumn('action2', function ($i) {
                    return '<div class="btn-group btn-group-sm ml-1" role="group"><button type="button" title="Cetak Dokumen" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-print"></i></button><div class="dropdown-menu">
                    <a data-load="modal-pdf" title="Cetak SPP-UP Nomor: ' . $i->nomor . '" href="' . route("penetapan-up.pdf-spp", $i->id) . '" class="dropdown-item">SPP-UP</a>
                    </div></div>';
                })
                ->editColumn('status', function ($i) {
                    switch ($i->status) {
                        case StatusPosting::Posting:
                            $badge = '<span class="badge badge-success">' . StatusPosting::Posting->value . '</span>';
                            break;
                        case StatusPosting::BelumPosting:
                            $badge = '<span class="badge badge-warning">' . StatusPosting::BelumPosting->value . '</span>';
                            break;
                        default:
                            $badge = '<span class="badge badge-secondary">-</span>';
                            break;
                    }
                    return $badge;
                })
                ->rawColumns(['action', 'action2', 'status'])
                ->toJson();
        else :

            $table = $builder->ajax(route('penetapan-up.index'))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addColumn(['data' => 'tanggal', 'title' => 'Tanggal', 'class' => 'text-center', 'width' => '1%', 'defaultContent' => '-'])
                ->addColumn(['data' => 'nomor', 'title' => 'Nomor Penetapan', 'class' => 'text-center', 'defaultContent' => '-'])
                ->addColumn(['data' => 'uraian', 'title' => 'Uraian'])
                ->addColumn(['data' => 'nilai', 'title' => 'Nilai', 'class' => 'text-right'])
                ->addColumn(['data' => 'status', 'title' => 'Status', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addAction(['data' => 'action2', 'title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
                ->parameters([
                    'order' => [
                        1, 'asc'
                    ],
                    'columnDefs' => [
                        [
                            'targets' => [4],
                            'render' => '$.fn.dataTable.render.number(".", ",", 2, "")'
                        ],
                        [
                            'targets' => [1],
                            'render' => 'function (data) {
                                if (data) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            }'
                        ],
                    ],
                ]);

            return view('pages.penatausahaan.penetapan-up.index', [
                'table' => $table
            ]);

        endif;
    }

    public function create()
    {
        return view(
            'pages.penatausahaan.penetapan-up.create',
            [
                'sub_unit_kerja' => SubUnitKerja::get(),
                'rek_sub_rincian_objek' => RekSubRincianObjek::get()
            ]
        );
    }

    public function store(PenetapanUpRequest $request)
    {
        PenetapanUp::create($request->validated());

        return response()->json(['message' => 'Penetapan UP berhasil ditambah.']);
    }

    public function edit(PenetapanUp $penetapan_up)
    {
        return view('pages.penatausahaan.penetapan-up.edit', [
            'penetapan_up' => $penetapan_up,
            'sub_unit_kerja' => SubUnitKerja::get(),
            'rek_sub_rincian_objek' => RekSubRincianObjek::get()
        ]);
    }

    public function update(PenetapanUp $penetapan_up, PenetapanUpRequest $request)
    {
        $penetapan_up->update($request->validated());

        return response()->json(['message' => 'Penetapan UP berhasil diubah.']);
    }

    public function destroy(PenetapanUp $penetapan_up)
    {
        $penetapan_up->delete();

        return response()->json(['message' => 'Penetapan UP berhasil dihapus.']);
    }

    public function printPdfSpp(PenetapanUp $penetapan_up)
    {

        return Pdf::loadView('pages.penatausahaan.penetapan-up.pdf-spp', compact(
            'penetapan_up',
        ))
            ->setPaper('a4', 'potrait')
            ->stream('SPP-UP.pdf');
    }
}
