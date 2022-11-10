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

    public function indexUnit(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::with(['urusan'])
                ->orderBy('kd_urusan')
                ->orderBy('kd_bidang')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('detail', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-action="open-tab" data-target="#unit" href="' . route('unit_subunit.unit.index', ['bidang_id' => $item->id]) . '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                    </div>
                    ';
                })
                ->addColumn('urusan', function ($item) {
                    return $item->urusan->kd . '  ' . $item->urusan->nama;
                })
                ->rawColumns(['detail'])
                ->make(true);
        }

        $table = $builder->ajax(route('urusan_bidang.bidang.index_unit'))
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'urusan', 'title' => 'Urusan'])
            ->addColumn(['data' => 'kd', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Bidang'])
            ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->parameters([
                "drawCallback" => "
                function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(1, {page: 'current'}).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<td colspan=\"4\"><strong>Urusan : ' + group + '</strong></td></tr>');
                            last = group;
                        }
                    });
                }
                ",
                "columnDefs" => [
                    [
                        "targets" => [1], "visible" => false,
                    ],
                ],
            ]);

        return view('pages.parameter.global.urusan_bidang.bidang.table_unit', compact('table'));
    }

    public function indexProgram(Builder $builder, Request $request)
    {
        if ($request->wantsJson()) {
            $data = Bidang::with(['urusan'])
                ->orderBy('kd_urusan')
                ->orderBy('kd_bidang')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('detail', function ($item) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a data-action="open-tab" data-target="#program" href="' . route('program_kegiatan.program.index', ['bidang_id' => $item->id]) . '" class="btn btn-primary text-white"><i class="fas fa-forward"></i></a>
                    </div>
                    ';
                })
                ->addColumn('urusan', function ($item) {
                    return $item->urusan->kd . '  ' . $item->urusan->nama;
                })
                ->rawColumns(['detail'])
                ->make(true);
        }

        $table = $builder->ajax(route('urusan_bidang.bidang.index_program'))
            ->addIndex(['title' => 'No.', 'class' => 'text-center', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'urusan', 'title' => 'Urusan'])
            ->addColumn(['data' => 'kd', 'title' => 'Kode Bidang', 'class' => 'font-weight-bold', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Bidang'])
            ->addColumn(['data' => 'detail', 'title' => '', 'style' => 'width: 1%;', 'orderable' => false])
            ->parameters([
                "drawCallback" => "
                function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(1, {page: 'current'}).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<td colspan=\"4\"><strong>Urusan : ' + group + '</strong></td></tr>');
                            last = group;
                        }
                    });
                }
                ",
                "columnDefs" => [
                    [
                        "targets" => [1], "visible" => false,
                    ],
                ],
            ]);

        return view('pages.parameter.global.urusan_bidang.bidang.table_program', compact('table'));
    }
}
