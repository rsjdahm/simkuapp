<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\Global\PegawaiRequest;
use App\Models\Parameter\Global\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PegawaiController extends Controller
{

    public function index()
    {
        return view('pages.parameter.global.pegawai.index');
    }

    public function table(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Pegawai::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('nama', '@if ($gelar_depan){{ $gelar_depan }} @endif {{ $nama }}@if ($gelar_belakang), {{ $gelar_belakang }} @endif')
                ->addColumn('action', '<div class="btn-group btn-group-sm" role="group"><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button><div class="dropdown-menu"><a data-load="modal" title="Edit Data Pegawai" href="{{ route("pegawai.edit", $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a><a data-action="delete" href="{{ route("pegawai.destroy", $id) }}" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</a></div><a data-action="open-tab" data-target="#detail-pegawai" href="{{ route("pegawai.show", $id) }}" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a></div>')
                ->toJson();
        }

        $table = $builder->minifiedAjax(route('pegawai.table'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Lengkap & Gelar'])
            ->addColumn(['data' => 'jenis_kelamin', 'title' => 'Jenis Kelamin'])
            ->addColumn(['data' => 'status_kepegawaian', 'title' => 'Status Kepegawaian'])
            ->parameters([
                'order' => [
                    2, 'asc'
                ]
            ]);

        return view('pages.parameter.global.pegawai.table', compact('table'));
    }

    public function show(Pegawai $pegawai)
    {
        return view('pages.parameter.global.pegawai.show', compact('pegawai'));
    }

    public function create()
    {
        return view('pages.parameter.global.pegawai.create');
    }

    public function store(PegawaiRequest $request)
    {
        Pegawai::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pages.parameter.global.pegawai.edit', compact('pegawai'));
    }

    public function update(Pegawai $pegawai, PegawaiRequest $request)
    {
        $pegawai->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
