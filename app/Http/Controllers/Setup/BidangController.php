<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\BidangRequest;
use App\Models\Setup\Bidang;
use App\Models\Setup\Urusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BidangController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::with([
                'urusan'
            ])->whereHas('urusan', function ($query) use ($request) {
                $query->when($request->filled('urusan_id'), function ($query) use ($request) {
                    $query->where('urusan_id', $request->urusan_id);
                });
            });

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Nomenklatur Bidang" href="{{ route("bidang.edit", $id) }}" class="dropdown-item">Edit</a><a data-action="delete" href="{{ route("bidang.destroy", $id) }}" class="dropdown-item text-danger">Hapus</a></div></div>')
                ->addColumn('kode_lengkap', '{{ $kode_lengkap }}')
                ->toJson();
        }

        $table = $builder->ajax([
            'url' => route('bidang.index'),
            'data' => 'function(d) {
                d.urusan_id = $("select[name=\'urusan_id_filter\']").val();
            }',
        ])
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addColumn(['data' => 'kode_lengkap', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nomenklatur Bidang'])
            ->parameters([
                'order' => [
                    1, 'asc'
                ]
            ]);

        $urusan = Urusan::all();

        return view('pages.setup.bidang.index', compact('table', 'urusan'));
    }

    public function create()
    {
        $urusan = Urusan::all();
        return view('pages.setup.bidang.create', compact('urusan'));
    }

    public function store(BidangRequest $request)
    {
        Bidang::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Bidang $bidang)
    {
        $urusan = Urusan::all();
        return view('pages.setup.bidang.edit', compact('bidang', 'urusan'));
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
