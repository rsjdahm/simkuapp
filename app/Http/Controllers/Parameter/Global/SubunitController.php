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
                    ->orderBy('kd_urusan')
                    ->orderBy('kd_bidang')
                    ->orderBy('kd_unit')
                    ->orderBy('kd_subunit')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                    <div class="btn-group btn-group-sm">
                        <a data-load="modal" title="Edit Subunit" href="' . route('unit_subunit.subunit.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                        <a data-action="delete" href="' . route('unit_subunit.subunit.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </div>
                    ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            $table = $builder->ajax(route('unit_subunit.subunit.index', ['unit_id' => $request->unit_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Subunit', 'class' => 'font-weight-bold'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Subunit']);

            $unit = Unit::findOrFail($request->unit_id);

            return view('pages.parameter.global.unit_subunit.subunit.table', compact('table', 'unit'));
        }
    }

    public function create(Request $request)
    {
        $unit = Unit::findOrFail($request->unit_id);
        return view('pages.parameter.global.unit_subunit.subunit.create', compact('unit'));
    }

    public function store(SubunitRequest $request)
    {
        Subunit::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Subunit $subunit)
    {
        return view('pages.parameter.global.unit_subunit.subunit.edit', compact('subunit'));
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
}
