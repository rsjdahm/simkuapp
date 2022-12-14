<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekRincObjekRequest;
use App\Models\Parameter\Global\RekObjek;
use App\Models\Parameter\Global\RekRincObjek;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekRincObjekController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = RekRincObjek::where('rek_objek_id', $request->rek_objek_id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Rekening Rincian Objek" href="{{ route("rek-rinc-objek.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("rek-rinc-objek.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#rek-sub-rinc-objek" href="{{ route("rek-sub-rinc-objek.index", ["rek_rinc_objek_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('rek-rinc-objek.index', ['rek_objek_id' => $request->rek_objek_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Rincian Objek', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        $rek_objek = RekObjek::findOrFail($request->rek_objek_id);

        return view('pages.parameter.global.rekening.rek-rinc-objek.table', compact('table', 'rek_objek'));
    }

    public function create(Request $request)
    {
        $rek_objek = RekObjek::findOrFail($request->rek_objek_id);
        return view('pages.parameter.global.rekening.rek-rinc-objek.create', compact('rek_objek'));
    }

    public function store(RekRincObjekRequest $request)
    {
        RekRincObjek::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekRincObjek $rek_rinc_objek)
    {
        return view('pages.parameter.global.rekening.rek-rinc-objek.edit', compact('rek_rinc_objek'));
    }

    public function update(RekRincObjek $rek_rinc_objek, RekRincObjekRequest $request)
    {
        $rek_rinc_objek->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekRincObjek $rek_rinc_objek)
    {
        $rek_rinc_objek->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
