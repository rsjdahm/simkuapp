<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#rka" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Dokumen RKA</td>
                    <td>:</td>
                    <th>{{ $rka->no_dokumen }}</th>
                    <td>{{ $rka->uraian }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Program RKA"
                href="{{ route('program-rka.create', ['rka_id' => $rka->id]) }}" class="btn btn-success text-white"><i
                    class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
