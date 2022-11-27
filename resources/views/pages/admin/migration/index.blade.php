<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="font-size-18">Migration</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item">Database</li>
                    <li class="breadcrumb-item active">Migration</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-danger border">
                <div class="card-header border-danger bg-transparent pb-2">
                    <h5 class="text-danger my-0"><i class="fas fa-exclamation-triangle mr-2"></i>Perhatian
                    </h5>
                </div>
                <div class="card-body pt-0">Migration ini berhubungan dengan DATABASE yang dapat berakibat fatal jika
                    salah mengoperasikan
                    dan menyebabkan data terhapus.
                    <strong>HARAP BERHATI-HATI</strong> dalam mengoperasikan!
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Daftar Migration</h4>
                    <div class="table-responsive">
                        {!! $table->table(['id' => time()]) !!}
                        {!! $table->scripts() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
