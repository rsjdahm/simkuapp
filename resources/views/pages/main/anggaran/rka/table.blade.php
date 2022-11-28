<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td></td>
                    <td>Unit</td>
                    <td>:</td>
                    <th>{{ $subunit->unit->kode }}</th>
                    <td>{{ $subunit->unit->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#subunit" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Subunit</td>
                    <td>:</td>
                    <th>{{ $subunit->kode }}</th>
                    <td>{{ $subunit->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Dokumen RKA"
                href="{{ route('rka.create', ['subunit_id' => $subunit->id]) }}" class="btn btn-success text-white"><i
                    class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
