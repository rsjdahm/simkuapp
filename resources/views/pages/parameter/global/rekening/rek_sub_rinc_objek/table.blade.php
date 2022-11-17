<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-akun"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Akun</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->kd }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Kelompok</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->kd }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->rek_kelompok->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-jenis"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Jenis</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->kd }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->rek_jenis->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-objek"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Objek</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->rek_objek->kd }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->rek_objek->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-rinc-objek"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Rincian Objek</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_rinc_objek->kd }}</th>
                    <td class="py-2">{{ $rek_rinc_objek->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek-sub-rinc-objek.create', ['rek_rinc_objek_id' => $rek_rinc_objek->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
