<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\SubkegiatanRequest;
use App\Models\Parameter\Global\Subkegiatan;
use App\Models\Parameter\Global\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class SubkegiatanController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Subkegiatan::where('kegiatan_id', $request->kegiatan_id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Subkegiatan" href="{{ route("subkegiatan.edit", $id) }}"  class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("subkegiatan.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('subkegiatan.index', ['kegiatan_id' => $request->kegiatan_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Subkegiatan', 'class' => 'font-weight-bold'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Subkegiatan'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        $kegiatan = Kegiatan::findOrFail($request->kegiatan_id);

        return view('pages.parameter.global.program-kegiatan.subkegiatan.table', compact('table', 'kegiatan'));
    }

    public function create(Request $request)
    {
        $kegiatan = Kegiatan::findOrFail($request->kegiatan_id);
        return view('pages.parameter.global.program-kegiatan.subkegiatan.create', compact('kegiatan'));
    }

    public function store(SubkegiatanRequest $request)
    {
        Subkegiatan::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Subkegiatan $subkegiatan)
    {
        return view('pages.parameter.global.program-kegiatan.subkegiatan.edit', compact('subkegiatan'));
    }

    public function update(Subkegiatan $subkegiatan, SubkegiatanRequest $request)
    {
        $subkegiatan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Subkegiatan $subkegiatan)
    {
        $subkegiatan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
