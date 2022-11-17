<div class="mb-3">
    <a data-load="modal" title="Tambah Nomenklatur Urusan" href="{{ route('urusan.create') }}"
        class="btn btn-success text-white"><i class="fas fa-plus mr-2"></i> Tambah</a>
</div>

<div class="table-responsive">
    {!! $table->table(['id' => Str::random(10)]) !!}
    {!! $table->scripts() !!}
</div>
