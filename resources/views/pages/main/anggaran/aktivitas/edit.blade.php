<form method="post" action="{{ route('aktivitas.update', $aktivita->id) }}">
    @csrf
    @method('put')
    <input type="hidden" name="subkegiatan_rka_id" value="{{ $aktivita->subkegiatan_rka_id }}">
    <div class="form-group">
        <label class="form-label">Uraian Aktivitas</label>
        <textarea name="uraian" class="form-control">{{ $aktivita->uraian }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('aktivitas.update', $aktivita->id) }}']").on("submit", function(event) {
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
