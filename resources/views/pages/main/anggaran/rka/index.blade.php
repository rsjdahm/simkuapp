<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Penganggaran RKA</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Main</a></li>
                    <li class="breadcrumb-item">Anggaran</a></li>
                    <li class="breadcrumb-item active">RKA</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dokumen RKA</h4>
                    <p class="card-title-desc mb-4">Data Rencana Kerja Anggaran Perangkat Daerah</p>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#subunit" role="tab">
                                <span><i class="fas fa-home mr-1"></i> Subunit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rka" role="tab">
                                <span><i class="fas fa-building mr-1"></i> Dokumen RKA</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="subunit" role="tabpanel"></div>
                        <div class="tab-pane" id="rka" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load('.tab-pane.active', '{{ route('subunit.rka.index') }}')
    });
</script>
