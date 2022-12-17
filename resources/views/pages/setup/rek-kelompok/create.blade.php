<form method="post" action="{{ route('rek-kelompok.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Rekening Akun</label>
        <select name="rek_akun_id" class="form-control">
            <option value="" disabled selected>Pilih Rekening Akun...</option>
            @foreach ($rek_akun as $rek_akun_item)
                <option value="{{ $rek_akun_item->id }}">[{{ $rek_akun_item->kode_lengkap }}] {{ $rek_akun_item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Kode Rekening Kelompok</label>
        <input type="number" name="kode" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Uraian Rekening Kelompok</label>
        <textarea name="nama" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("select[name='rek_akun_id']").val($("select[name='rek_akun_id_filter']").val()).trigger('change');

    $("form[action='{{ route('rek-kelompok.store') }}']").on("submit", function(event) {
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
