<form id="{{ time() }}_form" method="post" action="{{ route('program.update', $program->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label">Kode Program</label>
        <input name="bidang_id" type="hidden" value="{{ $program->bidang_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_urusan" class="form-control" type="number" value="{{ $program->kd_urusan }}">
            </div>
            <div class="col">
                <input readonly name="kd_bidang" class="form-control" type="number" value="{{ $program->kd_bidang }}">
            </div>
            <div class="col">
                <input name="kd_program" class="form-control" type="number" value="{{ $program->kd_program }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nomenklatur Program</label>
        <textarea name="nama" class="form-control">{{ $program->nama }}</textarea>
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
