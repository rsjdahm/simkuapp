<form method="post" action="{{ route('bukti-gu.update', $bukti_gu->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kode Rekening</label>
                <select name="belanja_rka_pd_id" class="form-control">
                    <option value="" disabled selected>Pilih Rekening Belanja...</option>
                    @foreach ($rek_akun->sortBy('kode_lengkap') as $rek_akun_item)
                        @foreach ($rek_akun_item->rek_kelompok->sortBy('kode_lengkap') as $rek_kelompok_item)
                            <option class="bg-warning font-weight-bold text-white" disabled>
                                {{ $rek_kelompok_item->kode_lengkap_nama }}</option>
                            @foreach ($rek_kelompok_item->rek_jenis->sortBy('kode_lengkap') as $rek_jenis_item)
                                <option class="bg-light text-primary font-weight-bold" style="padding-left: 1rem;"
                                    disabled>
                                    {{ $rek_jenis_item->kode_lengkap_nama }}
                                </option>
                                @foreach ($rek_jenis_item->rek_objek->sortBy('kode_lengkap') as $rek_objek_item)
                                    <option class="bg-light text-dark font-weight-bold" style="padding-left: 1.5rem;"
                                        disabled>
                                        {{ $rek_objek_item->kode_lengkap_nama }}
                                    </option>
                                    @foreach ($rek_objek_item->rek_rincian_objek->sortBy('kode_lengkap') as $rek_rincian_objek_item)
                                        <option class="bg-light text-dark font-weight-bold" style="padding-left: 2rem;"
                                            value="{{ $rek_rincian_objek_item->id }}" disabled>
                                            {{ $rek_rincian_objek_item->kode_lengkap_nama }}
                                        </option>
                                        @foreach ($rek_rincian_objek_item->rek_sub_rincian_objek->sortBy('kode_lengkap') as $rek_sub_rincian_objek_item)
                                            <option class="bg-light text-dark font-weight-bold"
                                                style="padding-left: 2.5rem;"
                                                value="{{ $rek_sub_rincian_objek_item->id }}" disabled>
                                                {{ $rek_sub_rincian_objek_item->kode_lengkap_nama }}
                                            </option>
                                            @foreach ($rek_sub_rincian_objek_item->belanja_rka_pd->sortBy('kode_lengkap') as $belanja_rka_pd_item)
                                                <option style="padding-left: 3rem;"
                                                    value="{{ $belanja_rka_pd_item->id }}" @selected($bukti_gu->belanja_rka_pd_id == $belanja_rka_pd_item->id)>
                                                    {{ $belanja_rka_pd_item->uraian }}
                                                    [Rp.{{ number_format($belanja_rka_pd_item->nilai, 2, ',', '.') }}]
                                                </option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nomor Bukti</label>
                <input autofocus type="number" name="nomor" class="form-control" value="{{ $bukti_gu->nomor }}">
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $bukti_gu->tanggal }}">
            </div>
            <div class="form-group">
                <label class="form-label">Uraian</label>
                <textarea name="uraian" class="form-control">{{ $bukti_gu->uraian }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control" value="{{ $bukti_gu->nilai }}">
            </div>
            <div class="form-group">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-control">
                    <option value="" disabled selected>Pilih Metode Pembayaran...</option>
                    @foreach (\App\Enums\Penatausahaan\MetodePembayaran::cases() as $metode_pembayaran)
                        <option value="{{ $metode_pembayaran }}" @selected($bukti_gu->metode_pembayaran == $metode_pembayaran)>{{ $metode_pembayaran }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    @foreach (\App\Enums\Penatausahaan\StatusBuktiGu::cases() as $status)
                        <option value="{{ $status }}" @selected($bukti_gu->status == $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Penerima</label>
                        <input name="nama" class="form-control" value="{{ $bukti_gu->nama }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Penerima</label>
                        <select name="jenis" class="form-control">
                            @foreach (\App\Enums\Penatausahaan\JenisBuktiGu::cases() as $jenis)
                                <option value="{{ $jenis }}" @selected($bukti_gu->jenis == $jenis)>{{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control">{{ $bukti_gu->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">NPWP</label>
                        <input type="number" name="npwp" class="form-control" value="{{ $bukti_gu->npwp }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank Penerima</label>
                        <select name="bank_id" class="form-control">
                            <option value="">Pilih Bank Penerima...</option>
                            @foreach ($bank as $bank_item)
                                <option value="{{ $bank_item->id }}" @selected($bukti_gu->bank_id == $bank_item->id)>
                                    [{{ $bank_item->kode }}] {{ $bank_item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. Rekening Penerima</label>
                        <input type="number" name="nomor_rekening" class="form-control"
                            value="{{ $bukti_gu->nomor_rekening }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('bukti-gu.update', $bukti_gu->id) }}']").on("submit", function(event) {
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
