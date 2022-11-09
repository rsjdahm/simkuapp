<form id="{{ time() }}_form" method="post" action="{{ route('urusan_bidang.bidang.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Kode Bidang</label>
        <input name="urusan_id" type="hidden" value="{{ request()->urusan_id }}">
        <div class="row">
            <div class="col">
                <input readonly name="kd_urusan" class="form-control" type="number" value="{{ $urusan->kd_urusan }}">
            </div>
            <div class="col">
                <input name="kd_bidang" class="form-control" type="number">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Nomenklatur</label>
        <textarea name="nama" class="form-control"></textarea>
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
