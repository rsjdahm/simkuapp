<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Bukti GU</h4>
                <a data-action="reload" class="btn btn-primary btn-sm float-right text-white"><i
                        class="fas fa-sync-alt"></i></a>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Penatausahaan</li>
                    <li class="breadcrumb-item">Belanja</li>
                    <li class="breadcrumb-item active">Bukti GU</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a data-load="modal" title="Tambah Bukti GU" href="{{ route('bukti-gu.create') }}"
                class="btn btn-success mb-3"><i class="fas fa-plus mr-2"></i> Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Status Pending:</label>
                                @foreach (App\Enums\Penatausahaan\StatusPending::cases() as $status_pending)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"
                                                name="status_pending_filter_table_bukti-gu"
                                                value="{{ $status_pending }}" @checked($status_pending == App\Enums\Penatausahaan\StatusPending::Normal)>
                                            {{ $status_pending }}
                                            <strong></strong>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-2">
                                <label>Bulan:</label>
                                <select name="bulan_filter_table_bukti-gu" class="form-control">
                                    <option value="">Semua Bulan...</option>
                                    @for ($bulan = 1; $bulan <= 12; $bulan++)
                                        <option value="{{ $bulan }}">
                                            {{ Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        {!! $table->table(['id' => 'bukti-gu'], true) !!}
                        {!! $table->scripts() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
