<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\SubunitRequest;
use App\Models\Parameter\Global\Subunit;
use App\Models\Parameter\Global\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class SubunitController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->unit_id) {
            if ($request->wantsJson()) {
                $data = Subunit::where('unit_id', $request->unit_id)
                    ->orderBy('kode');

                return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Subunit" href="{{ route("subunit.edit", $id) }}"  class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("subunit.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div></div>')
                    ->toJson();
            }

            $table = $builder->minifiedAjax(route('subunit.index', ['unit_id' => $request->unit_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kode', 'title' => 'Kode Subunit', 'class' => 'font-weight-bold'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Subunit']);

            $unit = Unit::findOrFail($request->unit_id);

            return view('pages.parameter.global.unit-subunit.subunit.table', compact('table', 'unit'));
        }
    }

    public function create(Request $request)
    {
        $unit = Unit::findOrFail($request->unit_id);
        return view('pages.parameter.global.unit-subunit.subunit.create', compact('unit'));
    }

    public function store(SubunitRequest $request)
    {
        Subunit::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Subunit $subunit)
    {
        return view('pages.parameter.global.unit-subunit.subunit.edit', compact('subunit'));
    }

    public function update(Subunit $subunit, SubunitRequest $request)
    {
        $subunit->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Subunit $subunit)
    {
        $subunit->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function indexRka(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Subunit::with(['unit'])
                ->orderBy('kode');

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm"><a data-action="open-tab" data-target="#rka" href="{{ route("rka.table", ["subunit_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->addColumn('unit', '{{ $unit["kode"] }} {{ $unit["nama"] }}')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('subunit.rka.index'))
            ->addAction(['title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'unit', 'title' => 'Unit'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Unit', 'class' => 'font-weight-bold text-nowrap', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Subunit SKPD'])
            ->parameters([
                "drawCallback" => "
                function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {page: 'current'}).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<td colspan=\"4\"><span class=\"mr-3 badge badge-pill badge-success\">Unit</span><strong>' + group + '</strong></td></tr>');
                            last = group;
                        }
                    });
                }
                ",
                "columnDefs" => [
                    [
                        "targets" => [2], "visible" => false,
                    ],
                ],
            ]);

        return view('pages.parameter.global.unit-subunit.subunit.table_rka', compact('table'));
    }
}
