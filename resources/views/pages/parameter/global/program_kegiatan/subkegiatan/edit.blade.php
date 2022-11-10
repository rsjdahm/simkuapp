<form id="{{ time() }}_form" method="post" action="{{ route('unit_subunit.subunit.update', $subunit->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label">Kode Subunit</label>
        <input name="unit_id" type="hidden" value="{{ $subunit->unit_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_urusan" class="form-control" type="number" value="{{ $subunit->kd_urusan }}">
            </div>
            <div class="col">
                <input readonly name="kd_bidang" class="form-control" type="number" value="{{ $subunit->kd_bidang }}">
            </div>
            <div class="col">
                <input readonly name="kd_unit" class="form-control" type="number" value="{{ $subunit->kd_unit }}">
            </div>
            <div class="col">
                <input name="kd_subunit" class="form-control" type="number" value="{{ $subunit->kd_subunit }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nama Subunit</label>
        <textarea name="nama" class="form-control">{{ $subunit->nama }}</textarea>
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
