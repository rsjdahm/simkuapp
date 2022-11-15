<div class="mb-3">
    <a data-load="modal" title="Tambah Data Pegawai" href="{{ route('pegawai.create') }}"
        class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => 'pegawai-table']) !!}
    {!! $table->scripts() !!}
</div>
