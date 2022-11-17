<form id="{{ time() }}_form" method="post"
    action="{{ route('program-kegiatan.subkegiatan.update', $subkegiatan->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label">Kode Kegiatan</label>
        <input name="kegiatan_id" type="hidden" value="{{ $subkegiatan->kegiatan_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_urusan" class="form-control" type="number"
                    value="{{ $subkegiatan->kd_urusan }}">
            </div>
            <div class="col">
                <input readonly name="kd_bidang" class="form-control" type="number"
                    value="{{ $subkegiatan->kd_bidang }}">
            </div>
            <div class="col">
                <input readonly name="kd_program" class="form-control" type="number"
                    value="{{ $subkegiatan->kd_program }}">
            </div>
            <div class="col">
                <input readonly name="kd_kegiatan" class="form-control" type="number"
                    value="{{ $subkegiatan->kd_kegiatan }}">
            </div>
            <div class="col">
                <input name="kd_subkegiatan" class="form-control" type="number"
                    value="{{ $subkegiatan->kd_subkegiatan }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nomenklatur Subkegiatan</label>
        <textarea name="nama" class="form-control">{{ $subkegiatan->nama }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
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
