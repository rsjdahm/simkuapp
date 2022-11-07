<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_akun" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Akun</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->kd_rek }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Kelompok</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->kd_rek }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_jenis" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Jenis</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->kd_rek }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_objek" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Objek</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->kd_rek }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_rinc_objek"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Rincian Objek</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->kd_rek }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek_sub_rinc_objek.create', ['rek_rinc_objek_id' => $rek_rinc_objek->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => time()]) !!}
    {!! $table->scripts() !!}
</div>
