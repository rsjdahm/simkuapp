<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#bidang"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Urusan</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $program->bidang->urusan->kd }}</th>
                    <td class="py-2">{{ $program->bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"></td>
                    <td class="py-2">Bidang</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $program->bidang->kd }}</th>
                    <td class="py-2">{{ $program->bidang->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#program"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Program</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $program->kd }}</th>
                    <td class="py-2">{{ $program->nama }}</td>
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
