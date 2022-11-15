<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#bidang"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Urusan</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $kegiatan->program->bidang->urusan->kd }}</th>
                    <td class="py-2">{{ $kegiatan->program->bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"></td>
                    <td class="py-2">Bidang</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $kegiatan->program->bidang->kd }}</th>
                    <td class="py-2">{{ $kegiatan->program->bidang->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#program"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Program</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $kegiatan->program->kd }}</th>
                    <td class="py-2">{{ $kegiatan->program->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#kegiatan"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Kegiatan</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $kegiatan->kd }}</th>
                    <td class="py-2">{{ $kegiatan->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a data-load="modal" title="Tambah Subkegiatan"
                href="{{ route('program_kegiatan.subkegiatan.create', ['kegiatan_id' => $kegiatan->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
