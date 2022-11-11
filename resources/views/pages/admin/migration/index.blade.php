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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2">Daftar Migration</h4>
                    <div class="alert alert-warning mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Migration ini berhubungan dengan DATABASE yang dapat berakibat fatal jika salah mengoperasikan
                        dan menyebabkan data terhapus.
                        <strong>HARAP BERHATI-HATI</strong> dalam mengoperasikan!
                    </div>
                    <div class="table-responsive">
                        {!! $table->table(['id' => time()]) !!}
                        {!! $table->scripts() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
