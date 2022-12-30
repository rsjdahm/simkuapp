@if ($bukti_gu->status == App\Enums\Penatausahaan\StatusBuktiGu::BelumPosting)
    <a data-load="modal" title="Tambah Potongan"
        href="{{ route('potongan-bukti-gu.create', ['bukti_gu_id' => $bukti_gu->id]) }}" class="btn btn-success mb-3"><i
            class="fas fa-plus mr-2"></i> Tambah</a>
@endif
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            {!! $table->table(['id' => Str::random(10)], true) !!}
            {!! $table->scripts() !!}
        </div>

    </div>
</div>
