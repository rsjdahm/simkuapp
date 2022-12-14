<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\BidangRequest;
use App\Models\Parameter\Global\Bidang;
use App\Models\Parameter\Global\Urusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BidangController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::where('urusan_id', $request->urusan_id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Nomenklatur Bidang" href="{{ route("bidang.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("bidang.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('bidang.index', ['urusan_id' => $request->urusan_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nomenklatur'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        $urusan = Urusan::findOrFail($request->urusan_id);

        return view('pages.parameter.global.urusan-bidang.bidang.table', compact('table', 'urusan'));
    }

    public function create(Request $request)
    {
        $urusan = Urusan::findOrFail($request->urusan_id);
        return view('pages.parameter.global.urusan-bidang.bidang.create', compact('urusan'));
    }

    public function store(BidangRequest $request)
    {
        Bidang::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Bidang $bidang)
    {
        return view('pages.parameter.global.urusan-bidang.bidang.edit', compact('bidang'));
    }

    public function update(Bidang $bidang, BidangRequest $request)
    {
        $bidang->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Bidang $bidang)
    {
        $bidang->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function indexUnit(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::with(['urusan']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm"><a data-action="open-tab" data-target="#unit" href="{{ route("unit.index", ["bidang_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->addColumn('urusan', '{{ $urusan["kode"] }} {{ $urusan["nama"] }}')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('bidang.unit.index'))
            ->addAction(['title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'urusan', 'title' => 'Urusan'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Bidang'])
            ->parameters([
                'order' => [
                    3, 'asc'
                ],
                'drawCallback' => '
                    function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: "current"
                        }).nodes();
                        var last = null;
                        api.column(2, {page: "current"}).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before("<td colspan=\'4\'><span class=\'mr-3 badge badge-pill badge-success\'>Urusan</span><strong>" + group + "</strong></td></tr>");
                                last = group;
                            }
                        });
                    }
                ',
                'columnDefs' => [
                    [
                        'targets' => [2], 'visible' => false,
                    ],
                ],
            ]);


        return view('pages.parameter.global.urusan-bidang.bidang.table_unit', compact('table'));
    }

    public function indexProgram(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::with(['urusan']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm"><a data-action="open-tab" data-target="#program" href="{{ route("program.index", ["bidang_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->addColumn('urusan', '{{ $urusan["kode"] }} {{ $urusan["nama"] }}')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('bidang.program.index'))
            ->addAction(['title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'urusan', 'title' => 'Urusan'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Bidang'])
            ->parameters([
                'order' => [
                    3, 'asc'
                ],
                'drawCallback' => '
                    function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: "current"
                        }).nodes();
                        var last = null;
                        api.column(2, {page: "current"}).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before("<td colspan=\'4\'><span class=\'mr-3 badge badge-pill badge-success\'>Urusan</span><strong>" + group + "</strong></td></tr>");
                                last = group;
                            }
                        });
                    }
                ',
                'columnDefs' => [
                    [
                        'targets' => [2], 'visible' => false,
                    ],
                ],
            ]);

        return view('pages.parameter.global.urusan-bidang.bidang.table_program', compact('table'));
    }
}
