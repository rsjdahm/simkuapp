<?php

namespace App\Http\Controllers\Main\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Anggaran\RkaRequest;
use App\Models\Main\Anggaran\Rka;
use App\Models\Parameter\Global\Subunit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RkaController extends Controller
{
    public function index()
    {
        return view('pages.main.anggaran.rka.index');
    }

    public function table(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Rka::where('subunit_id', $request->subunit_id);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button> <div class="dropdown-menu"><a data-load="modal" title="Edit Dokumen RKA" href="{{ route("rka.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("rka.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#program-rka" href="{{ route("program-rka.index", ["rka_id" => $id]) }}" class="btn btn-primary text-white" title="Lihat Program RKA"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('rka.table', ['subunit_id' => $request->subunit_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'tahun_anggaran', 'title' => 'Tahun Anggaran', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'no_dokumen', 'title' => 'No. Dokumen'])
            ->addColumn(['data' => 'uraian', 'title' => 'Uraian'])
            ->addColumn(['data' => 'tahun_anggaran', 'title' => 'Pagu Belanja'])
            ->addColumn(['data' => 'jenis', 'title' => 'Jenis']);

        $subunit = Subunit::findOrFail($request->subunit_id);

        return view('pages.main.anggaran.rka.table', compact('table', 'subunit'));
    }

    public function create(Request $request)
    {
        $subunit = Subunit::findOrFail($request->subunit_id);
        return view('pages.main.anggaran.rka.create', compact('subunit'));
    }

    public function store(RkaRequest $request)
    {
        Rka::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Rka $rka)
    {
        return view('pages.main.anggaran.rka.edit', compact('rka'));
    }

    public function update(Rka $rka, RkaRequest $request)
    {
        $rka->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Rka $rka)
    {
        $rka->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
