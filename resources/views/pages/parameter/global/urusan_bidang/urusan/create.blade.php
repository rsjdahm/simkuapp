<form method="post" action="{{ route('urusan_bidang.urusan.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Kode Urusan</label>
        <input name="kd_urusan" class="form-control" type="number">
    </div>
    <div class="form-group">
        <label class="form-label">Nomenklatur Urusan</label>
        <textarea name="nama" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('urusan_bidang.urusan.store') }}']").on("submit", function(event) {
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
