<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <table class="table-responsive m-0 table">
                <tr>
                    <td class="py-2"><a do="back-to-tab" tab="#rek_akun" class="btn btn-primary btn-sm text-white"><i
                                class="fas fa-backward"></i> Kembali</a></td>
                    <td class="py-2">Rekening Akun</td>
                    <td class="py-2">:</td>
                    <th class="py-2">{{ $rek_akun->kd_rek1 }}</th>
                    <td class="py-2">{{ $rek_akun->nama }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3 text-right">
            <a load="modal" title="Tambah Rekening Akun"
                href="{{ route('rekening.rek_kelompok.create', ['rek_akun_id' => $rek_akun->id]) }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => time()]) !!}
    {!! $table->scripts() !!}
</div>
