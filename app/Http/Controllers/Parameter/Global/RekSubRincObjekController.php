<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\RekSubRincObjekRequest;
use App\Models\Parameter\Global\RekRincObjek;
use App\Models\Parameter\Global\RekSubRincObjek;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekSubRincObjekController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->rek_rinc_objek_id) {
            if ($request->wantsJson()) {
                $data = RekSubRincObjek::where('rek_rinc_objek_id', $request->rek_rinc_objek_id)
                    ->orderBy('kd_rek1')
                    ->orderBy('kd_rek2')
                    ->orderBy('kd_rek3')
                    ->orderBy('kd_rek4')
                    ->orderBy('kd_rek5')
                    ->orderBy('kd_rek6')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm">
                            <a data-load="modal" title="Edit Rekening Sub Rincian Objek" href="' . route('rekening.rek_sub_rinc_objek.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                            <a data-action="delete" href="' . route('rekening.rek_sub_rinc_objek.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                        </div>
                        ';
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
            }

            $table = $builder->ajax(route('rekening.rek_sub_rinc_objek.index', ['rek_rinc_objek_id' => $request->rek_rinc_objek_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Sub Rincian Objek', 'class' => 'font-weight-bold text-nowrap', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening']);

            $rek_rinc_objek = RekRincObjek::findOrFail($request->rek_rinc_objek_id);

            return view('pages.parameter.global.rekening.rek_sub_rinc_objek.table', compact('table', 'rek_rinc_objek'));
        }
    }

    public function create(Request $request)
    {
        $rek_rinc_objek = RekRincObjek::findOrFail($request->rek_rinc_objek_id);
        return view('pages.parameter.global.rekening.rek_sub_rinc_objek.create', compact('rek_rinc_objek'));
    }

    public function store(RekSubRincObjekRequest $request)
    {
        RekSubRincObjek::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekSubRincObjek $rek_sub_rinc_objek)
    {
        return view('pages.parameter.global.rekening.rek_sub_rinc_objek.edit', compact('rek_sub_rinc_objek'));
    }

    public function update(RekSubRincObjek $rek_sub_rinc_objek, RekSubRincObjekRequest $request)
    {
        $rek_sub_rinc_objek->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(RekSubRincObjek $rek_sub_rinc_objek)
    {
        $rek_sub_rinc_objek->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
