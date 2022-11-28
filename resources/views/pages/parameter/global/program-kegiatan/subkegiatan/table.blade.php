<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#bidang" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Urusan</td>
                    <td>:</td>
                    <th>{{ $kegiatan->program->bidang->urusan->kode }}</th>
                    <td>{{ $kegiatan->program->bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang</td>
                    <td>:</td>
                    <th>{{ $kegiatan->program->bidang->kode }}</th>
                    <td>{{ $kegiatan->program->bidang->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#program" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Program</td>
                    <td>:</td>
                    <th>{{ $kegiatan->program->kode }}</th>
                    <td>{{ $kegiatan->program->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#kegiatan" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Kegiatan</td>
                    <td>:</td>
                    <th>{{ $kegiatan->kode }}</th>
                    <td>{{ $kegiatan->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Subkegiatan"
                href="{{ route('subkegiatan.create', ['kegiatan_id' => $kegiatan->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
