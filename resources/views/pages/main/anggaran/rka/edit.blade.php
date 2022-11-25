<form id="{{ time() }}_form" method="post" action="{{ route('rka.update', $pegawai->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3">
                <label class="form-label">Gelar Depan</label>
                <input type="text" name="gelar_dpn" class="form-control" value="{{ $pegawai->gelar_dpn }}">
            </div>
            <div class="col-sm-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}">
            </div>
            <div class="col-sm-3">
                <label class="form-label">Gelar Belakang</label>
                <input type="text" name="gelar_blkg" class="form-control" value="{{ $pegawai->gelar_blkg }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option disabled>-- Pilih Jenis Kelamin --</option>
            @foreach (\App\Enums\Parameter\Global\JenisKelaminEnum::cases() as $jenis_kelamin)
                <option @selected($pegawai->jenis_kelamin == $jenis_kelamin) value="{{ $jenis_kelamin }}">
                    {{ $jenis_kelamin }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">NIK</label>
        <input type="number" name="nik" class="form-control" value="{{ $pegawai->nik }}">
    </div>
    <div class="form-group">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}">
    </div>
    <div class="form-group">
        <label class="form-label">NPWP</label>
        <input type="text" name="npwp" class="form-control" value="{{ $pegawai->npwp }}">
    </div>
    <div class="form-group">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control">{{ $pegawai->alamat }}</textarea>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" class="form-control" value="{{ $pegawai->tmpt_lahir }}">
            </div>
            <div class="col-sm-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ $pegawai->tgl_lahir }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Status Pegawai</label>
        <select name="status_kepeg" class="form-control">
            <option disabled>-- Pilih Status Pegawai --</option>
            @foreach (\App\Enums\Parameter\Global\StatusKepegawaianEnum::cases() as $status_kepeg)
                <option @selected($pegawai->status_kepeg == $status_kepeg) value="{{ $status_kepeg }}">
                    {{ $status_kepeg->value }}
                </option>
            @endforeach
        </select>
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
