<?php

namespace App\Http\Controllers\Main\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Anggaran\KegiatanRkaRequest;
use App\Models\Main\Anggaran\KegiatanRka;
use App\Models\Main\Anggaran\ProgramRka;
use App\Models\Parameter\Global\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class KegiatanRkaController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = KegiatanRka::where('program_rka_id', $request->program_rka_id)
                ->with(['kegiatan', 'program_rka.program']);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button> <div class="dropdown-menu"><a data-load="modal" title="Edit Kegiatan RKA" href="{{ route("kegiatan-rka.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("kegiatan-rka.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#subkegiatan-rka" href="{{ route("subkegiatan-rka.index", ["kegiatan_rka_id" => $id]) }}" class="btn btn-primary text-white" title="Lihat Subkegiatan RKA"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('kegiatan-rka.index', ['program_rka_id' => $request->program_rka_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'program_rka.program.kode', 'title' => 'Kode Program', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kegiatan.kode', 'title' => 'Kode Kegiatan', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kegiatan.nama', 'title' => 'Uraian Kegiatan RKA']);

        $program_rka = ProgramRka::findOrFail($request->program_rka_id);

        return view('pages.main.anggaran.kegiatan-rka.table', compact('table', 'program_rka'));
    }

    public function create(Request $request)
    {
        $program_rka = ProgramRka::findOrFail($request->program_rka_id);
        $kegiatan = Kegiatan::all();
        return view('pages.main.anggaran.kegiatan-rka.create', compact('kegiatan', 'program_rka'));
    }

    public function store(KegiatanRkaRequest $request)
    {
        KegiatanRka::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(KegiatanRka $kegiatan_rka)
    {
        $kegiatan = Kegiatan::all();

        return view('pages.main.anggaran.kegiatan-rka.edit', compact('kegiatan_rka', 'kegiatan'));
    }

    public function update(KegiatanRka $kegiatan_rka, KegiatanRkaRequest $request)
    {
        $kegiatan_rka->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(KegiatanRka $kegiatan_rka)
    {
        $kegiatan_rka->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
