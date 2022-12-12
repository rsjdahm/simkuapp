<?php

namespace App\Http\Controllers\Main\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Anggaran\AktivitasRequest;
use App\Models\Main\Anggaran\KegiatanRka;
use App\Models\Main\Anggaran\Aktivitas;
use App\Models\Main\Anggaran\SubkegiatanRka;
use App\Models\Parameter\Global\Subkegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class AktivitasController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Aktivitas::where('subkegiatan_rka_id', $request->subkegiatan_rka_id)
                ->with(['subkegiatan_rka.subkegiatan']);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button> <div class="dropdown-menu"><a data-load="modal" title="Edit Subkegiatan RKA" href="{{ route("aktivitas.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("aktivitas.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('aktivitas.index', ['subkegiatan_rka_id' => $request->subkegiatan_rka_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'subkegiatan_rka.subkegiatan.kode', 'title' => 'Kode Subkegiatan', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'uraian', 'title' => 'Uraian']);

        $subkegiatan_rka = SubkegiatanRka::findOrFail($request->subkegiatan_rka_id);

        return view('pages.main.anggaran.aktivitas.table', compact('table', 'subkegiatan_rka'));
    }

    public function create(Request $request)
    {
        $subkegiatan_rka = SubkegiatanRka::findOrFail($request->subkegiatan_rka_id);
        return view('pages.main.anggaran.aktivitas.create', compact('subkegiatan_rka'));
    }

    public function store(AktivitasRequest $request)
    {
        Aktivitas::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Aktivitas $aktivitas)
    {
        $subkegiatan = Subkegiatan::all();

        return view('pages.main.anggaran.aktivitas.edit', compact('aktivitas', 'subkegiatan'));
    }

    public function update(Aktivitas $aktivitas, AktivitasRequest $request)
    {
        $aktivitas->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Aktivitas $aktivitas)
    {
        $aktivitas->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
