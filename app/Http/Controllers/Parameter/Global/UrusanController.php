<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\UrusanRequest;
use App\Models\Parameter\Global\Urusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class UrusanController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Urusan::orderBy('kd_urusan');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a data-load="modal" title="Edit Nomenklatur Urusan" href="' . route('urusan.edit', $item->id) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                            <a data-action="delete" href="' . route('urusan.destroy', $item->id) . '" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                        <a data-action="open-tab" data-target="#bidang" href="' . route('bidang.index', ['urusan_id' => $item->id]) . '" class="btn btn-primary text-white">
                            <i class="fas fa-forward"></i>
                        </a>
                    </div>
                    ';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('urusan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kd', 'title' => 'Kode Urusan', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nomenklatur']);

        return view('pages.parameter.global.urusan-bidang.urusan.table', compact('table'));
    }

    public function create()
    {
        return view('pages.parameter.global.urusan-bidang.urusan.create');
    }

    public function store(UrusanRequest $request)
    {
        Urusan::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Urusan $urusan)
    {
        return view('pages.parameter.global.urusan-bidang.urusan.edit', compact('urusan'));
    }

    public function update(Urusan $urusan, UrusanRequest $request)
    {
        $urusan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Urusan $urusan)
    {
        $urusan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
