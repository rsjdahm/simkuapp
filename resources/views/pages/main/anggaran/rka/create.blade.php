<form method="post" action="{{ route('rka.store') }}">
    @csrf
    <input type="hidden" name="subunit_id" value="{{ $subunit->id }}">
    <div class="form-group">
        <label class="form-label">Jenis Dokumen</label>
        <select name="jenis" class="form-control">
            <option disabled selected>-- Pilih Jenis Dokumen --</option>
            @foreach (\App\Enums\Main\Anggaran\JenisRkaEnum::cases() as $jenis)
                <option value="{{ $jenis }}">{{ $jenis }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Tahun Anggaran</label>
        <select name="tahun_anggaran" class="form-control">
            <option disabled selected>-- Pilih Tahun Anggaran --</option>
            <option value="2023">2023</option>
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">No. Dokumen</label>
        <input type="text" name="no_dokumen" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Tanggal Dokumen</label>
        <input type="date" name="tanggal_dokumen" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Uraian</label>
        <textarea name="uraian" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('rka.store') }}']").on("submit", function(event) {
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
