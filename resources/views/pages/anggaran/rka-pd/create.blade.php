<form method="post" action="{{ route('rka-pd.store') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Sub Unit Kerja</label>
        <select name="sub_unit_kerja_id" class="form-control">
            <option value="" disabled selected>Pilih Sub Unit Kerja...</option>
            @foreach ($sub_unit_kerja as $sub_unit_kerja_item)
                <option value="{{ $sub_unit_kerja_item->id }}">
                    [{{ $sub_unit_kerja_item->kode_lengkap }}]
                    {{ $sub_unit_kerja_item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Nomor Dokumen RKA</label>
        <input name="nomor" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Status RKA</label>
        <select name="status" class="form-control">
            <option value="" disabled selected>Pilih Status RKA...</option>
            @foreach ($status as $status_item)
                <option value="{{ $status_item }}">{{ $status_item }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Tanggal Dokumen RKA</label>
        <input type="date" name="tanggal" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Uraian Dokumen RKA</label>
        <textarea name="uraian" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label class="form-label">Nilai Pagu Pendapatan</label>
        <input name="pagu_pendapatan" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Nilai Pagu Pengeluaran</label>
        <input name="pagu_pengeluaran" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Nilai Pagu Pembiayaan</label>
        <input name="pagu_pembiayaan" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("select[name='sub_unit_kerja_id']").val($("select[name='sub_unit_kerja_id_filter']").val()).trigger('change');

    $("form[action='{{ route('rka-pd.store') }}']").on("submit", function(event) {
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
