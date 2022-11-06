<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td><a do="back-to-tab" tab="#rek_akun" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Akun</td>
                    <td>:</td>
                    <th>{{ $rek_kelompok->rek_akun->kd_rek }}</th>
                    <td>{{ $rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td><a do="back-to-tab" tab="#rek_kelompok" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Kelompok</td>
                    <td>:</td>
                    <th>{{ $rek_kelompok->kd_rek }}</th>
                    <td>{{ $rek_kelompok->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek_jenis.create', ['rek_kelompok_id' => $rek_kelompok->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => time()]) !!}
    {!! $table->scripts() !!}
</div>
