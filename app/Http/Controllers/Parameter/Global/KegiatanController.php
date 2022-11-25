<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\KegiatanRequest;
use App\Models\Parameter\Global\Kegiatan;
use App\Models\Parameter\Global\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class KegiatanController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->program_id) {
            if ($request->wantsJson()) {
                $data = Kegiatan::where('program_id', $request->program_id)
                    ->orderBy('kd_urusan')
                    ->orderBy('kd_bidang')
                    ->orderBy('kd_program')
                    ->orderBy('kd_kegiatan');

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a data-load="modal" title="Edit Kegiatan" href="' . route('kegiatan.edit', $item->id) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                <a data-action="delete" href="' . route('kegiatan.destroy', $item->id) . '" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                            <a data-action="open-tab" data-target="#subkegiatan" href="' . route('subkegiatan.index', ['kegiatan_id' => $item->id]) . '" class="btn btn-primary text-white">
                                <i class="fas fa-forward"></i>
                            </a>
                        </div>
                        ';
                    })
                    ->make(true);
            }

            $table = $builder->ajax(route('kegiatan.index', ['program_id' => $request->program_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Kegiatan', 'class' => 'font-weight-bold'])
                ->addColumn(['data' => 'nama', 'title' => 'Nama Kegiatan']);

            $program = Program::findOrFail($request->program_id);

            return view('pages.parameter.global.program-kegiatan.kegiatan.table', compact('table', 'program'));
        }
    }

    public function create(Request $request)
    {
        $program = Program::findOrFail($request->program_id);
        return view('pages.parameter.global.program-kegiatan.kegiatan.create', compact('program'));
    }

    public function store(KegiatanRequest $request)
    {
        Kegiatan::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('pages.parameter.global.program-kegiatan.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Kegiatan $kegiatan, KegiatanRequest $request)
    {
        $kegiatan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
