<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\UnitRequest;
use App\Models\Parameter\Global\Unit;
use App\Models\Parameter\Global\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class UnitController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->bidang_id) {
            if ($request->wantsJson()) {
                $data = Unit::where('bidang_id', $request->bidang_id)
                    ->orderBy('kd_urusan')
                    ->orderBy('kd_bidang')
                    ->orderBy('kd_unit');

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Unit" href="{{ route("unit.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("unit.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#subunit" href="{{ route("subunit.index", ["unit_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                    ->make(true);
            }

            $table = $builder->minifiedAjax(route('unit.index', ['bidang_id' => $request->bidang_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Unit', 'class' => 'font-weight-bold'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Unit']);

            $bidang = Bidang::findOrFail($request->bidang_id);

            return view('pages.parameter.global.unit-subunit.unit.table', compact('table', 'bidang'));
        }
    }

    public function create(Request $request)
    {
        $bidang = Bidang::findOrFail($request->bidang_id);
        return view('pages.parameter.global.unit-subunit.unit.create', compact('bidang'));
    }

    public function store(UnitRequest $request)
    {
        Unit::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Unit $unit)
    {
        return view('pages.parameter.global.unit-subunit.unit.edit', compact('unit'));
    }

    public function update(Unit $unit, UnitRequest $request)
    {
        $unit->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
