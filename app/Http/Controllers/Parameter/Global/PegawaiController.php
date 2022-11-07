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
            $data = Pegawai::orderBy('nama')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a load="modal" title="Edit Data Pegawai" href="' . route('pegawai.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                        <a do="delete" href="' . route('pegawai.destroy', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </div>
                    ';
                })
                ->addColumn('detail', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a do="open-to-tab" target="detail_pegawai_page" tab="#detail_pegawai" href="' . route('pegawai.show', $item->id) . '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                    </div>
                    ';
                })
                ->rawColumns(['action', 'detail'])
                ->make(true);
        }

        $table = $builder->ajax(route('pegawai.table'))
            ->addAction(['title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama_lengkap', 'title' => 'Nama Lengkap & Gelar'])
            ->addColumn(['data' => 'jenis_kelamin', 'title' => 'Jenis Kelamin'])
            ->addColumn(['data' => 'status_kepeg', 'title' => 'Status Kepegawaian'])
            ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false]);

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
