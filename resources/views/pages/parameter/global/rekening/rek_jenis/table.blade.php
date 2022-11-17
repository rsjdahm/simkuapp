<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive table-borderless m-0 table">
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-akun"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Akun</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_kelompok->rek_akun->kd }}</th>
                    <td class="py-2">{{ $rek_kelompok->rek_akun->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2"><a data-action="back-tab" data-target="#rek-kelompok"
                            class="btn btn-primary btn-sm text-white"><i class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Kelompok</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_kelompok->kd }}</th>
                    <td class="py-2">{{ $rek_kelompok->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12 text-right">
            <a data-load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek-jenis.create', ['rek_kelompok_id' => $rek_kelompok->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
