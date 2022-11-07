<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="font-size-18">Data Pegawai</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a>Parameter</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Global</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Organisasi</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a load="page" href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    </li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Pegawai</h4>
                    <p class="card-title-desc mb-2">Berdasarkan data kepegawaian
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
                        <div class="tab-pane active" id="pegawai" role="tabpanel">
                            <pegawai_page></pegawai_page>
                        </div>
                        <div class="tab-pane" id="detail_pegawai" role="tabpanel">
                            <detail_pegawai_page></detail_pegawai_page>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        load('pegawai_page', '{{ route('pegawai.table') }}')
    });
</script>
