<form id="{{ time() }}_form" method="post" action="{{ route('unit.update', $unit->id) }}">
    @csrf
    @method('put')
    <input name="bidang_id" type="hidden" value="{{ $unit->bidang_id }}">
    <div class="form-group">
        <label class="form-label">Kode Unit</label>
        <input name="kode" class="form-control" value="{{ $unit->kode }}">
    </div>
    <div class="form-group">
        <label class="form-label">Nama Unit</label>
        <textarea name="nama" class="form-control">{{ $unit->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("input[name='kode']").inputmask("9-99.9-99.9-99.99", {
        placeholder: "0"
    });
    $("form#{{ time() }}_form").on("submit", function(event) {
        event.preventDefault();
        const form = $(this);
        const data = new FormData($(this)[0]);
        $.ajax({
            data,
            url: form.attr("action"),
            type: form.attr("method"),
            processData: false,
            contentType: false,
            success: function(response) {
                toastr.success(response.message);
                $('table.datatable').DataTable().ajax.reload(null, false);
                form.closest('div.modal').modal("hide");
            }
        });
        return false;
    });
</script>
