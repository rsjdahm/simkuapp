<form method="post" action="{{ route('potongan-bukti-gu.update', $potongan_bukti_gu->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="bukti_gu_id" value="{{ $potongan_bukti_gu->bukti_gu_id }}">
            <div class="form-group">
                <label class="form-label">Jenis Potongan</label>
                <select name="potongan_pfk_id" class="form-control">
                    <option value="">Pilih Jenis Potongan...</option>
                    @foreach ($potongan_pfk as $potongan_pfk_item)
                        <option value="{{ $potongan_pfk_item->id }}" @selected($potongan_bukti_gu->potongan_pfk_id == $potongan_pfk_item->id)>
                            {{ $potongan_pfk_item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nilai Potongan</label>
                <input name="nilai" class="form-control" value="{{ $potongan_bukti_gu->nilai }}">
            </div>
            <div class="form-group">
                <label class="form-label">Nomor Billing</label>
                <input name="nomor_billing" class="form-control" value="{{ $potongan_bukti_gu->nomor_billing }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    @foreach (\App\Enums\Penatausahaan\StatusPotonganBuktiGu::cases() as $status)
                        <option value="{{ $status }}" @selected($potongan_bukti_gu->status == $status)>{{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">NTPN/Bukti Penyetoran</label>
                <input name="nomor_penyetoran" class="form-control" value="{{ $potongan_bukti_gu->nomor_penyetoran }}">
            </div>
        </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('potongan-bukti-gu.update', $potongan_bukti_gu->id) }}']").on("submit", function(event) {
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
