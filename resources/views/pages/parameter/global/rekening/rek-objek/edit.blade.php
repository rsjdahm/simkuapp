<form method="post" action="{{ route('rek-objek.update', $rek_objek->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label">Kode Rekening Jenis</label>
        <input name="rek_jenis_id" type="hidden" value="{{ $rek_objek->rek_jenis_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_rek1" class="form-control" type="number" value="{{ $rek_objek->kd_rek1 }}">
            </div>
            <div class="col">
                <input readonly name="kd_rek2" class="form-control" type="number" value="{{ $rek_objek->kd_rek2 }}">
            </div>
            <div class="col">
                <input readonly name="kd_rek3" class="form-control" type="number" value="{{ $rek_objek->kd_rek3 }}">
            </div>
            <div class="col">
                <input name="kd_rek4" class="form-control" type="number" value="{{ $rek_objek->kd_rek4 }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nama Rekening</label>
        <textarea name="nama" class="form-control">{{ $rek_objek->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
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