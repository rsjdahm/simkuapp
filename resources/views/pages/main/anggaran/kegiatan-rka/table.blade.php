<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#rka" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Dokumen RKA</td>
                    <td>:</td>
                    <th>{{ $program_rka->rka->no_dokumen }}</th>
                    <td>{{ $program_rka->rka->uraian }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#program-rka" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Program RKA</td>
                    <td>:</td>
                    <th>{{ $program_rka->program->kode }}</th>
                    <td>{{ $program_rka->program->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Kegiatan RKA"
                href="{{ route('kegiatan-rka.create', ['program_rka_id' => $program_rka->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
