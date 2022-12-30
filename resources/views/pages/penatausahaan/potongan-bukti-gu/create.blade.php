<form method="post" action="{{ route('potongan-bukti-gu.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="bukti_gu_id" value="{{ request()->bukti_gu_id }}">
            <div class="form-group">
                <label class="form-label">Jenis Potongan</label>
                <select name="potongan_pfk_id" class="form-control">
                    <option value="">Pilih Jenis Potongan...</option>
                    @foreach ($potongan_pfk as $potongan_pfk_item)
                        <option value="{{ $potongan_pfk_item->id }}">{{ $potongan_pfk_item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nilai Potongan</label>
                <input name="nilai" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">Nomor Billing</label>
                <input name="nomor_billing" class="form-control">
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <input name="status" value="{{ App\Enums\Penatausahaan\StatusPotonganBuktiGu::BelumSetor }}"
                        readonly class="form-control">
                    {{-- <select name="status" class="form-control">
                            @foreach (\App\Enums\Penatausahaan\StatusPotonganBuktiGu::cases() as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select> --}}
                </div>
                <label class="form-label">NTPN/Bukti Penyetoran</label>
                <input name="nomor_penyetoran" class="form-control">
            </div>
        </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
    </div>
</form>

<script>
    $("form[action='{{ route('potongan-bukti-gu.store') }}']").on("submit", function(event) {
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
