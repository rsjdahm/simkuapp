<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Rekening</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Parameter</a></li>
                    <li class="breadcrumb-item">Global</a></li>
                    <li class="breadcrumb-item active">Rekening</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Rekening</h4>
                    <p class="card-title-desc mb-2">Daftar kode rekening ditetapkan berdasarkan regulasi
                        Kementerian
                        Dalam Negeri.
                    </p>
                    <div class="alert alert-success mb-4" role="alert">
                        <i class="fas fa-receipt mr-2"></i>
                        Permendagri No. 90 Tahun 2019 tentang Klasifikasi, Kodefikasi, dan Nomenklatur Perencanaan
                        Pembangunan dan Keuangan Daerah
                    </div>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#rek-akun" role="tab">
                                <span><i class="fas fa-home mr-1"></i></span> Akun</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rek-kelompok" role="tab">
                                <span><i class="fas fa-layer-group mr-1"></i></span> Kelompok</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rek-jenis" role="tab">
                                <span><i class="fas fa-archive mr-1"></i></span> Jenis</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rek-objek" role="tab">
                                <span><i class="fas fa-building mr-1"></i></span> Objek</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rek-rinc-objek" role="tab">
                                <span><i class="fas fa-calculator mr-1"></i></span> Rincian Objek</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#rek-sub-rinc-objek" role="tab">
                                <span><i class="fas fa-chart-bar mr-1"></i></span> Sub Rincian Objek</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted py-3">
                        <div class="tab-pane active" id="rek-akun" role="tabpanel"></div>
                        <div class="tab-pane" id="rek-kelompok" role="tabpanel"></div>
                        <div class="tab-pane" id="rek-jenis" role="tabpanel"></div>
                        <div class="tab-pane" id="rek-objek" role="tabpanel"></div>
                        <div class="tab-pane" id="rek-rinc-objek" role="tabpanel"> </div>
                        <div class="tab-pane" id="rek-sub-rinc-objek" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load('.tab-pane.active', '{{ route('rek-akun.index') }}')
    });
</script>
