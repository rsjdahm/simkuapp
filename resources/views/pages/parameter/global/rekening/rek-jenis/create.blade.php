<form method="post" action="{{ route('rek-jenis.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Kode Rekening Jenis</label>
        <input name="rek_kelompok_id" type="hidden" value="{{ request()->rek_kelompok_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_rek1" class="form-control" type="number" value="{{ $rek_kelompok->kd_rek1 }}">
            </div>
            <div class="col">
                <input readonly name="kd_rek2" class="form-control" type="number" value="{{ $rek_kelompok->kd_rek2 }}">
            </div>
            <div class="col">
                <input name="kd_rek3" class="form-control" type="number">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nama Rekening Jenis</label>
        <textarea name="nama" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('rek-jenis.store') }}']").on("submit", function(event) {
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
