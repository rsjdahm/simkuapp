<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-akun" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Akun</td>
                    <td>:</td>
                    <th>{{ $rek_jenis->rek_kelompok->rek_akun->kode }}</th>
                    <td>{{ $rek_jenis->rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Kelompok</td>
                    <td>:</td>
                    <th>{{ $rek_jenis->rek_kelompok->kode }}</th>
                    <td>{{ $rek_jenis->rek_kelompok->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-jenis" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Jenis</td>
                    <td>:</td>
                    <th>{{ $rek_jenis->kode }}</th>
                    <td>{{ $rek_jenis->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Rekening Akun"
                href="{{ route('rek-objek.create', ['rek_jenis_id' => $rek_jenis->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
