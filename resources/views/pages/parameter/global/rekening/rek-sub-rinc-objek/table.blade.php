<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless table-sm m-0 table">
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-akun" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Akun</td>
                    <td>:</td>
                    <th>{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->kd }}</th>
                    <td>{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Kelompok</td>
                    <td>:</td>
                    <th>{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->kd }}</th>
                    <td>{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-jenis" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Jenis</td>
                    <td>:</td>
                    <th>{{ $rek_rinc_objek->rek_objek->rek_jenis->kd }}</th>
                    <td>{{ $rek_rinc_objek->rek_objek->rek_jenis->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-objek" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Objek</td>
                    <td>:</td>
                    <th>{{ $rek_rinc_objek->rek_objek->kd }}</th>
                    <td>{{ $rek_rinc_objek->rek_objek->nama }}</td>
                </tr>
                <tr>
                    <td><a data-action="back-tab" data-target="#rek-rinc-objek"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td>Rekening Rincian Objek</td>
                    <td>:</td>
                    <th>{{ $rek_rinc_objek->kd }}</th>
                    <td>{{ $rek_rinc_objek->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Rekening Akun"
                href="{{ route('rek-sub-rinc-objek.create', ['rek_rinc_objek_id' => $rek_rinc_objek->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
