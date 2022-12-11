<form method="post" action="{{ route('program-rka.store') }}">
    @csrf
    <input type="hidden" name="rka_id" value="{{ $rka->id }}">
    <div class="form-group">
        <label class="form-label">Program RKA</label>
        <select name="program_id" class="form-control">
            <option disabled selected>-- Pilih Program RKA --</option>
            @foreach ($program as $program)
                <option value="{{ $program->id }}">{{ $program->kode }} {{ $program->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('program-rka.store') }}']").on("submit", function(event) {
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
