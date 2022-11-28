<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#bidang" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Urusan</td>
                    <td>:</td>
                    <th>{{ $program->bidang->urusan->kode }}</th>
                    <td>{{ $program->bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang</td>
                    <td>:</td>
                    <th>{{ $program->bidang->kode }}</th>
                    <td>{{ $program->bidang->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#program" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Program</td>
                    <td>:</td>
                    <th>{{ $program->kode }}</th>
                    <td>{{ $program->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Program"
                href="{{ route('kegiatan.create', ['program_id' => $program->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
