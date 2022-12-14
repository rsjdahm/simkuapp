<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekJenisRequest;
use App\Models\Parameter\Global\RekKelompok;
use App\Models\Parameter\Global\RekJenis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekJenisController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = RekJenis::where('rek_kelompok_id', $request->rek_kelompok_id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Rekening Jenis" href="{{ route("rek-jenis.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("rek-jenis.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#rek-objek" href="{{ route("rek-objek.index", ["rek_jenis_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('rek-jenis.index', ['rek_kelompok_id' => $request->rek_kelompok_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Jenis', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        $rek_kelompok = RekKelompok::findOrFail($request->rek_kelompok_id);

        return view('pages.parameter.global.rekening.rek-jenis.table', compact('table', 'rek_kelompok'));
    }

    public function create(Request $request)
    {
        $rek_kelompok = RekKelompok::findOrFail($request->rek_kelompok_id);
        return view('pages.parameter.global.rekening.rek-jenis.create', compact('rek_kelompok'));
    }

    public function store(RekJenisRequest $request)
    {
        RekJenis::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekJenis $rek_jeni)
    {
        return view('pages.parameter.global.rekening.rek-jenis.edit', ['rek_jenis' => $rek_jeni]);
    }

    public function update(RekJenis $rek_jeni, RekJenisRequest $request)
    {
        $rek_jeni->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekJenis $rek_jeni)
    {
        $rek_jeni->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
