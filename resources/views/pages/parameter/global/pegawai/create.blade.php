<form id="{{ time() }}_form" method="post" action="{{ route('pegawai.store') }}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3">
                <label class="form-label">Gelar Depan</label>
                <input type="text" name="gelar_dpn" class="form-control">
            </div>
            <div class="col-sm-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="col-sm-3">
                <label class="form-label">Gelar Belakang</label>
                <input type="text" name="gelar_blkg" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option disabled selected>-- Pilih Jenis Kelamin --</option>
            @foreach (\App\Enums\Parameter\Global\JenisKelaminPegawaiEnum::cases() as $jenis_kelamin)
                <option value="{{ $jenis_kelamin->value }}">{{ $jenis_kelamin->value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">NIK</label>
        <input type="number" name="nik" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" class="form-control">
            </div>
            <div class="col-sm-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Status Pegawai</label>
        <select name="status_kepeg" class="form-control">
            <option disabled selected>-- Pilih Status Pegawai --</option>
            @foreach (\App\Enums\Parameter\Global\JenisPegawaiEnum::cases() as $status_kepeg)
                <option value="{{ $status_kepeg->value }}">{{ $status_kepeg->value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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
