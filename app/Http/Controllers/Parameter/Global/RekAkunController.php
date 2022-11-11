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
            $data = RekAkun::orderBy('kd_rek1')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-load="modal" title="Edit Rekening Akun" href="' . route('rekening.rek_akun.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                        <a data-action="delete" href="' . route('rekening.rek_akun.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </div>
                    ';
                })
                ->addColumn('detail', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-action="open-tab" data-target="#rek_kelompok" href="' . route('rekening.rek_kelompok.index', ['rek_akun_id' => $item->id]) . '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                    </div>
                    ';
                })
                ->rawColumns(['action', 'detail'])
                ->make(true);
        }

        $table = $builder->ajax(route('rekening.rek_akun.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kd', 'title' => 'Kode Akun', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false]);

        return view('pages.parameter.global.rekening.rek_akun.table', compact('table'));
    }

    public function create()
    {
        return view('pages.parameter.global.rekening.rek_akun.create');
    }

    public function store(RekAkunRequest $request)
    {
        RekAkun::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekAkun $rek_akun)
    {
        return view('pages.parameter.global.rekening.rek_akun.edit', compact('rek_akun'));
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
