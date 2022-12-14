<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekKelompokRequest;
use App\Models\Parameter\Global\RekAkun;
use App\Models\Parameter\Global\RekKelompok;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekKelompokController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = RekKelompok::where('rek_akun_id', $request->rek_akun_id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal"  title="Edit Rekening Kelompok" href="{{ route("rek-kelompok.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("rek-kelompok.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#rek-jenis" href="{{ route("rek-jenis.index", ["rek_kelompok_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('rek-kelompok.index', ['rek_akun_id' => $request->rek_akun_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Kelompok', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        $rek_akun = RekAkun::findOrFail($request->rek_akun_id);

        return view('pages.parameter.global.rekening.rek-kelompok.table', compact('table', 'rek_akun'));
    }

    public function create(Request $request)
    {
        $rek_akun = RekAkun::findOrFail($request->rek_akun_id);
        return view('pages.parameter.global.rekening.rek-kelompok.create', compact('rek_akun'));
    }

    public function store(RekKelompokRequest $request)
    {
        RekKelompok::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekKelompok $rek_kelompok)
    {
        return view('pages.parameter.global.rekening.rek-kelompok.edit', compact('rek_kelompok'));
    }

    public function update(RekKelompok $rek_kelompok, RekKelompokRequest $request)
    {
        $rek_kelompok->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekKelompok $rek_kelompok)
    {
        $rek_kelompok->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
