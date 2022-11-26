<form method="post" action="{{ route('rek-kelompok.update', $rek_kelompok->id) }}">
    @csrf
    @method('put')
    <input name="rek_akun_id" type="hidden" value="{{ $rek_kelompok->rek_akun_id }}">
    <div class="form-group">
        <label class="form-label">Kode Rekening Kelompok</label>
        <input name="kode" class="form-control" value="{{ $rek_kelompok->kode }}">
    </div>
    <div class="form-group">
        <label class="form-label">Nama Rekening Kelompok</label>
        <textarea name="nama" class="form-control">{{ $rek_kelompok->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('rek-kelompok.update', $rek_kelompok->id) }}']").on("submit", function(event) {
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
