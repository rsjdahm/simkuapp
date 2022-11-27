<form method="post" action="{{ route('rek-objek.update', $rek_objek->id) }}">
    @csrf
    @method('put')
    <input name="rek_jenis_id" type="hidden" value="{{ $rek_objek->rek_jenis_id }}">
    <div class="form-group">
        <label class="form-label">Kode Rekening Objek</label>
        <input name="kode" class="form-control" value="{{ $rek_objek->kode }}">
    </div>
    <div class="form-group">
        <label class="form-label">Nama Rekening Objek</label>
        <textarea name="nama" class="form-control">{{ $rek_objek->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("input[name='kode']").inputmask("9.9.99.99", {
        placeholder: "0"
    });
    $("form[action='{{ route('rek-objek.update', $rek_objek->id) }}']").on("submit", function(event) {
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
