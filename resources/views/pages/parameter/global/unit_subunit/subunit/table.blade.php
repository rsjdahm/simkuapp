<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#bidang"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Urusan</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $unit->bidang->urusan->kd }}</th>
                    <td class="py-2">{{ $unit->bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"></td>
                    <td class="py-2">Bidang</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $unit->bidang->kd }}</th>
                    <td class="py-2">{{ $unit->bidang->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#unit"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Unit</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $unit->kd }}</th>
                    <td class="py-2">{{ $unit->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a data-load="modal" title="Tambah Data Subunit"
                href="{{ route('unit_subunit.subunit.create', ['unit_id' => $unit->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
