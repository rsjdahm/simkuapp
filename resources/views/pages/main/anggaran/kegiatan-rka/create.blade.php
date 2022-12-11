<form method="post" action="{{ route('kegiatan-rka.store') }}">
    @csrf
    <input type="hidden" name="program_rka_id" value="{{ $program_rka->id }}">
    <div class="form-group">
        <label class="form-label">Kegiatan RKA</label>
        <select name="kegiatan_id" class="form-control">
            <option disabled selected>-- Pilih Kegiatan RKA --</option>
            @foreach ($kegiatan as $kegiatan)
                <option value="{{ $kegiatan->id }}">{{ $kegiatan->kode }} {{ $kegiatan->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('kegiatan-rka.store') }}']").on("submit", function(event) {
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
