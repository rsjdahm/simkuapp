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
            $data = Urusan::orderBy('kd_urusan')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-load="modal" title="Edit Nomenklatur Urusan" href="' . route('urusan_bidang.urusan.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                        <a data-action="delete" href="' . route('urusan_bidang.urusan.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </div>
                    ';
                })
                ->addColumn('detail', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-action="open-tab" data-target="#bidang" href="' . route('urusan_bidang.bidang.index', ['urusan_id' => $item->id]) . '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                    </div>
                    ';
                })
                ->rawColumns(['action', 'detail'])
                ->make(true);
        }

        $table = $builder->ajax(route('urusan_bidang.urusan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'kd', 'title' => 'Kode Urusan', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nomenklatur'])
            ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false]);

        return view('pages.parameter.global.urusan_bidang.urusan.table', compact('table'));
    }

    public function create()
    {
        return view('pages.parameter.global.urusan_bidang.urusan.create');
    }

    public function store(UrusanRequest $request)
    {
        Urusan::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Urusan $urusan)
    {
        return view('pages.parameter.global.urusan_bidang.urusan.edit', compact('urusan'));
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
