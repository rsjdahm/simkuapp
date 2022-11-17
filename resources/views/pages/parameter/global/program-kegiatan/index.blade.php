<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Program, Kegiatan, dan Subkegiatan</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Parameter</a></li>
                    <li class="breadcrumb-item">Global</a></li>
                    <li class="breadcrumb-item">Nomenklatur</li>
                    <li class="breadcrumb-item active">Program-Kegiatan</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nomenklatur Program, Kegiatan, dan Subkegiatan</h4>
                    <p class="card-title-desc mb-4">Data berdasarkan Peraturan pelaksanaan Pemerintah Provinsi
                        Kalimantan Timur.
                    </p>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#bidang" role="tab">
                                <span><i class="fas fa-home mr-1"></i> Urusan-Bidang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#program" role="tab">
                                <span><i class="fas fa-building mr-1"></i> Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#kegiatan" role="tab">
                                <span><i class="fas fa-briefcase mr-1"></i> Kegiatan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#subkegiatan" role="tab">
                                <span><i class="fas fa-book mr-1"></i> Subkegiatan</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="bidang" role="tabpanel"></div>
                        <div class="tab-pane" id="program" role="tabpanel"></div>
                        <div class="tab-pane" id="kegiatan" role="tabpanel"></div>
                        <div class="tab-pane" id="subkegiatan" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load('.tab-pane.active', '{{ route('bidang.program.index') }}')
    });
</script>
