<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td></td>
                    <td>Urusan</td>
                    <td>:</td>
                    <th>{{ $bidang->urusan->kd }}</th>
                    <td>{{ $bidang->urusan->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#bidang" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Bidang</td>
                    <td>:</td>
                    <th>{{ $bidang->kd }}</th>
                    <td>{{ $bidang->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Data Unit"
                href="{{ route('unit.create', ['bidang_id' => $bidang->id]) }}" class="btn btn-success text-white"><i
                    class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
