<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekObjekRequest;
use App\Models\Parameter\Global\RekJenis;
use App\Models\Parameter\Global\RekObjek;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekObjekController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->rek_jenis_id) {
            if ($request->wantsJson()) {
                $data = RekObjek::where('rek_jenis_id', $request->rek_jenis_id)
                    ->orderBy('kd_rek1')
                    ->orderBy('kd_rek2')
                    ->orderBy('kd_rek3')
                    ->orderBy('kd_rek4');

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a data-load="modal" title="Edit Rekening Objek" href="' . route('rek-objek.edit', $item->id) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                <a data-action="delete" href="' . route('rek-objek.destroy', $item->id) . '" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                            <a data-action="open-tab" data-target="#rek-rinc-objek" href="'  . route('rek-rinc-objek.index', ['rek_objek_id' => $item->id]) .   '" class="btn btn-primary text-white">
                                <i class="fas fa-forward"></i>
                            </a>
                        </div>
                        ';
                    })
                    ->make(true);
            }

            $table = $builder->ajax(route('rek-objek.index', ['rek_jenis_id' => $request->rek_jenis_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Objek', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening']);

            $rek_jenis = RekJenis::findOrFail($request->rek_jenis_id);

            return view('pages.parameter.global.rekening.rek-objek.table', compact('table', 'rek_jenis'));
        }
    }

    public function create(Request $request)
    {
        $rek_jenis = RekJenis::findOrFail($request->rek_jenis_id);
        return view('pages.parameter.global.rekening.rek-objek.create', compact('rek_jenis'));
    }

    public function store(RekObjekRequest $request)
    {
        RekObjek::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekObjek $rek_objek)
    {
        return view('pages.parameter.global.rekening.rek-objek.edit', compact('rek_objek'));
    }

    public function update(RekObjek $rek_objek, RekObjekRequest $request)
    {
        $rek_objek->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekObjek $rek_objek)
    {
        $rek_objek->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
