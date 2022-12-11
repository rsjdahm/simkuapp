<?php

namespace App\Http\Controllers\Main\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Anggaran\SubkegiatanRkaRequest;
use App\Models\Main\Anggaran\KegiatanRka;
use App\Models\Main\Anggaran\SubkegiatanRka;
use App\Models\Parameter\Global\Subkegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class SubkegiatanRkaController extends Controller
{
    public function index(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = SubkegiatanRka::where('kegiatan_rka_id', $request->kegiatan_rka_id)
                ->with(['subkegiatan', 'kegiatan_rka.kegiatan']);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button> <div class="dropdown-menu"><a data-load="modal" title="Edit Subkegiatan RKA" href="{{ route("subkegiatan-rka.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("subkegiatan-rka.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#subkegiatan-rka" href="{{ route("subkegiatan-rka.index", ["kegiatan_rka_id" => $id]) }}" class="btn btn-primary text-white" title="Lihat Subkegiatan RKA"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('subkegiatan-rka.index', ['kegiatan_rka_id' => $request->kegiatan_rka_id]))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'kegiatan_rka.kegiatan.kode', 'title' => 'Kode Kegiatan', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'subkegiatan.kode', 'title' => 'Kode Subkegiatan', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'subkegiatan.nama', 'title' => 'Uraian Subkegiatan RKA']);

        $kegiatan_rka = KegiatanRka::findOrFail($request->kegiatan_rka_id);

        return view('pages.main.anggaran.subkegiatan-rka.table', compact('table', 'kegiatan_rka'));
    }

    public function create(Request $request)
    {
        $kegiatan_rka = KegiatanRka::findOrFail($request->kegiatan_rka_id);
        $subkegiatan = Subkegiatan::all();
        return view('pages.main.anggaran.subkegiatan-rka.create', compact('subkegiatan', 'kegiatan_rka'));
    }

    public function store(SubkegiatanRkaRequest $request)
    {
        SubkegiatanRka::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(SubkegiatanRka $subkegiatan_rka)
    {
        $subkegiatan = Subkegiatan::all();

        return view('pages.main.anggaran.subkegiatan-rka.edit', compact('subkegiatan_rka', 'subkegiatan'));
    }

    public function update(SubkegiatanRka $subkegiatan_rka, SubkegiatanRkaRequest $request)
    {
        $subkegiatan_rka->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(SubkegiatanRka $subkegiatan_rka)
    {
        $subkegiatan_rka->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
