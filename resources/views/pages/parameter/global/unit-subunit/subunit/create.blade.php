<form method="post" action="{{ route('subunit.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Kode Subunit</label>
        <input name="unit_id" type="hidden" value="{{ request()->unit_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_urusan" class="form-control" type="number" value="{{ $unit->kd_urusan }}">
            </div>
            <div class="col">
                <input readonly name="kd_bidang" class="form-control" type="number" value="{{ $unit->kd_bidang }}">
            </div>
            <div class="col">
                <input readonly name="kd_unit" class="form-control" type="number" value="{{ $unit->kd_unit }}">
            </div>
            <div class="col">
                <input name="kd_subunit" class="form-control" type="number">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nama Subunit</label>
        <textarea name="nama" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('subunit.store') }}']").on("submit", function(event) {
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
