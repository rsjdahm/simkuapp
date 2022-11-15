<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek_akun"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Akun</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_jenis->rek_kelompok->rek_akun->kd }}</th>
                    <td class="py-2">{{ $rek_jenis->rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek_kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Kelompok</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_jenis->rek_kelompok->kd }}</th>
                    <td class="py-2">{{ $rek_jenis->rek_kelompok->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek_jenis"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Jenis</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_jenis->kd }}</th>
                    <td class="py-2">{{ $rek_jenis->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a data-load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek_objek.create', ['rek_jenis_id' => $rek_jenis->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => 'rekening-rek_objek-table']) !!}
    {!! $table->scripts() !!}
</div>
