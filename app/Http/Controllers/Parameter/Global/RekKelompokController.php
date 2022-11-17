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
        if ($request->rek_akun_id) {
            if ($request->wantsJson()) {
                $data = RekKelompok::where('rek_akun_id', $request->rek_akun_id)
                    ->orderBy('kd_rek1')
                    ->orderBy('kd_rek2')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a data-load="modal"  title="Edit Rekening Kelompok" href="' . route('rekening.rek-kelompok.edit', $item->id) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                <a data-action="delete" href="' . route('rekening.rek-kelompok.destroy', $item->id) . '" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                            <a data-action="open-tab" data-target="#rek_jenis" href="' . route('rekening.rek-jenis.index', ['rek_kelompok_id' => $item->id]) .  '" class="btn btn-primary text-white">
                                <i class="fas fa-forward"></i>
                            </a>
                        </div>
                        ';
                    })
                    ->make(true);
            }

            $table = $builder->ajax(route('rekening.rek-kelompok.index', ['rek_akun_id' => $request->rek_akun_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Kelompok', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening']);

            $rek_akun = RekAkun::findOrFail($request->rek_akun_id);

            return view('pages.parameter.global.rekening.rek_kelompok.table', compact('table', 'rek_akun'));
        }
    }

    public function create(Request $request)
    {
        $rek_akun = RekAkun::findOrFail($request->rek_akun_id);
        return view('pages.parameter.global.rekening.rek_kelompok.create', compact('rek_akun'));
    }

    public function store(RekKelompokRequest $request)
    {
        RekKelompok::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekKelompok $rek_kelompok)
    {
        return view('pages.parameter.global.rekening.rek_kelompok.edit', compact('rek_kelompok'));
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
