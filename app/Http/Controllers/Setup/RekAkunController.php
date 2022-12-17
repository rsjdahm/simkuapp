<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\RekAkunRequest;
use App\Models\Setup\RekAkun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekAkunController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = RekAkun::query();

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Nomenklatur Rekening Akun" href="{{ route("rek-akun.edit", $id) }}" class="dropdown-item">Edit</a><a data-action="delete" href="{{ route("rek-akun.destroy", $id) }}" class="dropdown-item text-danger">Hapus</a></div></div>')
                ->addColumn('kode_lengkap', '{{ $kode_lengkap }}')
                ->toJson();
        }

        $table = $builder->ajax(route('rek-akun.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addColumn(['data' => 'kode_lengkap', 'title' => 'Kode Rekening Akun', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Uraian Rekening Akun'])
            ->parameters([
                'order' => [
                    1, 'asc'
                ]
            ]);

        return view('pages.setup.rek-akun.index', compact('table'));
    }

    public function create()
    {
        return view('pages.setup.rek-akun.create');
    }

    public function store(RekAkunRequest $request)
    {
        RekAkun::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekAkun $rek_akun)
    {
        return view('pages.setup.rek-akun.edit', compact('rek_akun'));
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
