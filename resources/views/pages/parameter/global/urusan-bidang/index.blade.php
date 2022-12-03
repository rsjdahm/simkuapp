<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Urusan dan Bidang</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Parameter</a></li>
                    <li class="breadcrumb-item">Global</a></li>
                    <li class="breadcrumb-item">Nomenklatur</li>
                    <li class="breadcrumb-item active">Urusan-Bidang</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nomenklatur Urusan dan Bidang</h4>
                    <p class="card-title-desc mb-0">Nomenklatur Urusan dan Bidang
                        ditetapkan berdasarkan regulasi
                        Kementerian
                        Dalam Negeri.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#urusan" role="tab">
                                <span><i class="fas fa-home text-danger mr-1"></i> Urusan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#bidang" role="tab">
                                <span><i class="fas fa-layer-group text-danger mr-1"></i> Bidang</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="urusan" role="tabpanel"></div>
                        <div class="tab-pane" id="bidang" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load('.tab-pane.active', '{{ route('urusan.index') }}')
    });
</script>
