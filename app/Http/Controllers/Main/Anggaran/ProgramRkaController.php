<?php

namespace App\Http\Controllers\Main\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Anggaran\ProgramRkaRequest;
use App\Models\Main\Anggaran\ProgramRka;
use App\Models\Main\Anggaran\Rka;
use App\Models\Parameter\Global\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ProgramRkaController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = ProgramRka::where('rka_id', $request->rka_id)
                ->with(['program']);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button> <div class="dropdown-menu"><a data-load="modal" title="Edit Program RKA" href="{{ route("program-rka.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("program-rka.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#kegiatan-rka" href="{{ route("kegiatan-rka.index", ["program_rka_id" => $id]) }}" class="btn btn-primary text-white" title="Lihat Kegiatan RKA"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('program-rka.index', ['rka_id' => $request->rka_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'program.kode', 'title' => 'Kode Program', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'program.nama', 'title' => 'Uraian Program RKA']);

        $rka = Rka::findOrFail($request->rka_id);

        return view('pages.main.anggaran.program-rka.table', compact('table', 'rka'));
    }

    public function create(Request $request)
    {
        $rka = Rka::findOrFail($request->rka_id);
        $program = Program::all();
        return view('pages.main.anggaran.program-rka.create', compact('rka', 'program'));
    }

    public function store(ProgramRkaRequest $request)
    {
        ProgramRka::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(ProgramRka $program_rka)
    {
        $program = Program::all();

        return view('pages.main.anggaran.program-rka.edit', compact('program_rka', 'program'));
    }

    public function update(ProgramRka $program_rka, ProgramRkaRequest $request)
    {
        $program_rka->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(ProgramRka $program_rka)
    {
        $program_rka->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
