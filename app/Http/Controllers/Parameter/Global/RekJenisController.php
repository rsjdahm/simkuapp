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
        if ($request->rek_kelompok_id) {
            if ($request->wantsJson()) {
                $data = RekJenis::where('rek_kelompok_id', $request->rek_kelompok_id)
                    ->orderBy('kd_rek1')
                    ->orderBy('kd_rek2')
                    ->orderBy('kd_rek3')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm">
                            <a data-load="modal" title="Edit Rekening Jenis" href="' . route('rekening.rek_jenis.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                            <a data-action="delete" href="' . route('rekening.rek_jenis.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                        </div>
                        ';
                    })
                    ->addColumn('detail', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm">
                            <a data-action="open-tab" data-target="#rek_objek" href="' . route('rekening.rek_objek.index', ['rek_jenis_id' => $item->id]) .  '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                        </div>
                        ';
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
            }

            $table = $builder->ajax(route('rekening.rek_jenis.index', ['rek_kelompok_id' => $request->rek_kelompok_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Jenis', 'class' => 'font-weight-bold text-nowrap', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
                ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false]);

            $rek_kelompok = RekKelompok::findOrFail($request->rek_kelompok_id);

            return view('pages.parameter.global.rekening.rek_jenis.table', compact('table', 'rek_kelompok'));
        }
    }

    public function create(Request $request)
    {
        $rek_kelompok = RekKelompok::findOrFail($request->rek_kelompok_id);
        return view('pages.parameter.global.rekening.rek_jenis.create', compact('rek_kelompok'));
    }

    public function store(RekJenisRequest $request)
    {
        RekJenis::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(RekJenis $rek_jeni)
    {
        return view('pages.parameter.global.rekening.rek_jenis.edit', ['rek_jenis' => $rek_jeni]);
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
