<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\BidangRequest;
use App\Models\Parameter\Global\Bidang;
use App\Models\Parameter\Global\Urusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BidangController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->urusan_id) {
            if ($request->wantsJson()) {
                $data = Bidang::where('urusan_id', $request->urusan_id)
                    ->orderBy('kd_urusan')
                    ->orderBy('kd_bidang')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return '
                    <div class="btn-group btn-group-sm">
                        <a data-load="modal" title="Edit Nomenklatur Bidang" href="' . route('urusan_bidang.bidang.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                        <a data-action="delete" href="' . route('urusan_bidang.bidang.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </div>
                    ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            $table = $builder->ajax(route('urusan_bidang.bidang.index', ['urusan_id' => $request->urusan_id]))
                ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
                ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'kd', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
                ->addColumn(['data' => 'nama', 'title' => 'Nomenklatur']);

            $urusan = Urusan::findOrFail($request->urusan_id);

            return view('pages.parameter.global.urusan_bidang.bidang.table', compact('table', 'urusan'));
        }
    }

    public function create(Request $request)
    {
        $urusan = Urusan::findOrFail($request->urusan_id);
        return view('pages.parameter.global.urusan_bidang.bidang.create', compact('urusan'));
    }

    public function store(BidangRequest $request)
    {
        Bidang::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Bidang $bidang)
    {
        return view('pages.parameter.global.urusan_bidang.bidang.edit', compact('bidang'));
    }

    public function update(Bidang $bidang, BidangRequest $request)
    {
        $bidang->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Bidang $bidang)
    {
        $bidang->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
