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
