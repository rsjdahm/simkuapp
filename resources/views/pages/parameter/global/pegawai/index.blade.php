<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Data Pegawai</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Parameter</li>
                    <li class="breadcrumb-item">Global</li>
                    <li class="breadcrumb-item">Organisasi</li>
                    <li class="breadcrumb-item active">Data Pegawai</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Pegawai</h4>
                    <p class="card-title-desc mb-4">Berdasarkan data kepegawaian terbaru.
                    </p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pegawai" role="tab">
                                <span><i class="fas fa-users mr-1"></i></span> Daftar Pegawai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#detail_pegawai" role="tab">
                                <span><i class="fas fa-user mr-1"></i></span> Detail Pegawai</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="pegawai" role="tabpanel"></div>
                        <div class="tab-pane" id="detail_pegawai" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        load('#pegawai', '{{ route('pegawai.table') }}')
    });
</script>
