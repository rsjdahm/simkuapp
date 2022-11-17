<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\ProgramRequest;
use App\Models\Parameter\Global\Program;
use App\Models\Parameter\Global\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ProgramController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->bidang_id) {
            if ($request->wantsJson()) {
                $data = Program::where('bidang_id', $request->bidang_id)
                    ->orderBy('kd_urusan')
                    ->orderBy('kd_bidang')
                    ->orderBy('kd_program')
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
                                <a data-load="modal" title="Edit Program" href="' . route('program-kegiatan.program.edit', $item->id) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                <a data-action="delete" href="' . route('program-kegiatan.program.destroy', $item->id) . '" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                            <a data-action="open-tab" data-target="#kegiatan" href="' . route('program-kegiatan.kegiatan.index', ['program_id' => $item->id]) . '" class="btn btn-primary text-white">
                                <i class="fas fa-forward"></i>
                            </a>
                        </div>
                        ';
                    })
                    ->make(true);
            }

            $table = $builder->ajax(route('program-kegiatan.program.index', ['bidang_id' => $request->bidang_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Program', 'class' => 'font-weight-bold'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Program']);

            $bidang = Bidang::findOrFail($request->bidang_id);

            return view('pages.parameter.global.program_kegiatan.program.table', compact('table', 'bidang'));
        }
    }

    public function create(Request $request)
    {
        $bidang = Bidang::findOrFail($request->bidang_id);
        return view('pages.parameter.global.program_kegiatan.program.create', compact('bidang'));
    }

    public function store(ProgramRequest $request)
    {
        Program::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Program $program)
    {
        return view('pages.parameter.global.program_kegiatan.program.edit', compact('program'));
    }

    public function update(Program $program, ProgramRequest $request)
    {
        $program->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
