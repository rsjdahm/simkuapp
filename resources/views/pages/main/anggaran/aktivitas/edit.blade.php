<form method="post" action="{{ route('subkegiatan-rka.update', $subkegiatan_rka->id) }}">
    @csrf
    @method('put')
    <input type="hidden" name="kegiatan_rka_id" value="{{ $subkegiatan_rka->kegiatan_rka_id }}">
    <div class="form-group">
        <label class="form-label">Kegiatan RKA</label>
        <select name="subkegiatan_id" class="form-control">
            <option disabled selected>-- Pilih Kegiatan RKA --</option>
            @foreach ($subkegiatan as $subkegiatan)
                <option @selected($subkegiatan->id == $subkegiatan_rka->subkegiatan_id) value="{{ $subkegiatan->id }}">[{{ $subkegiatan->kode }}]
                    {{ $subkegiatan->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('subkegiatan-rka.update', $subkegiatan_rka->id) }}']").on("submit", function(event) {
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
