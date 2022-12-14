<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekAkunRequest;
use App\Models\Parameter\Global\RekAkun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekAkunController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = RekAkun::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Rekening Akun" href="{{ route("rek-akun.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("rek-akun.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#rek-kelompok" href="{{ route("rek-kelompok.index", ["rek_akun_id" => $id]) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('rek-akun.index'))
            ->addAction(['title' => '', 'class' => 'text-nowrap', 'style' => 'width: 1%;', 'orderable' => false])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Akun', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->parameters([
                'order' => [
                    1, 'asc'
                ]
            ]);

        return view('pages.parameter.global.rekening.rek-akun.table', compact('table'));
    }

    public function create()
    {
        return view('pages.parameter.global.rekening.rek-akun.create');
    }

    public function store(RekAkunRequest $request)
    {
        RekAkun::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekAkun $rek_akun)
    {
        return view('pages.parameter.global.rekening.rek-akun.edit', compact('rek_akun'));
    }

    public function update(RekAkun $rek_akun, RekAkunRequest $request)
    {
        $rek_akun->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekAkun $rek_akun)
    {
        $rek_akun->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
