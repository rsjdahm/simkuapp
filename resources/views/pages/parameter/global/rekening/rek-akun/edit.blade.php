<form method="post" action="{{ route('rek-akun.update', $rek_akun->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label">Kode Rekening Akun</label>
        <input name="kode" class="form-control" value="{{ $rek_akun->kode }}">
    </div>
    <div class="form-group">
        <label class="form-label">Nama Rekening Akun</label>
        <textarea name="nama" class="form-control">{{ $rek_akun->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("input[name='kode']").inputmask("9", {
        placeholder: "0"
    });
    $("form[action='{{ route('rek-akun.update', $rek_akun->id) }}']").on("submit", function(event) {
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
