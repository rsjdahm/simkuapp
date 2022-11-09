<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="font-size-18">Unit dan Subunit</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Parameter</a></li>
                    <li class="breadcrumb-item">Global</a></li>
                    <li class="breadcrumb-item">Nomenklatur</li>
                    <li class="breadcrumb-item active">Unit - Subunit</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Unit - Subunit</h4>
                    <p class="card-title-desc mb-4">Data berdasarkan Peraturan pelaksanaan Pemerintah Provinsi
                        Kalimantan Timur.
                    </p>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#bidang" role="tab">
                                <span><i class="fas fa-home mr-1"></i> Urusan-Bidang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#unit" role="tab">
                                <span><i class="fas fa-building mr-1"></i> Unit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#subunit" role="tab">
                                <span><i class="fas fa-briefcase mr-1"></i> Subunit</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="bidang" role="tabpanel"></div>
                        <div class="tab-pane" id="unit" role="tabpanel"></div>
                        <div class="tab-pane" id="subunit" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load('#bidang', '{{ route('urusan_bidang.bidang.index_unit') }}')
    });
</script>
