<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-md-9">
            <strong>Rekening Akun</strong>
            <br />
            Keterangan:
            <br />
            <ul>
                <li>NERACA: ASET, KEWAJIBAN, EKUITAS</li>
                <li>RPA/LRA: PENDAPATAN DAERAH, BELANJA DAERAH, PEMBIAYAAN DAERAH</li>
                <li>LO: PENDAPATAN DAERAH-LO, BEBAN DAERAH</li>
            </ul>
        </div>
        <div class="col-md-3 text-right">
            <a data-load="modal" title="Tambah Rekening Akun" href="{{ route('rekening.rek_akun.create') }}"
                class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
