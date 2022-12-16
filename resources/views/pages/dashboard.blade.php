<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4>Dashboard</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ringkasan</li>
                </ol>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Alamat IP</p>
                            <h4 class="mb-0">{{ request()->ip() }}</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-desktop font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Waktu Server</p>
                            <h4 class="mb-0" id="txt"></h4>
                            <script>
                                $(function() {
                                    startTime();
                                });

                                function startTime() {
                                    var today = new Date();
                                    var h = today.getHours();
                                    var m = today.getMinutes();
                                    var s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('txt').innerHTML =
                                        h + ":" + m + ":" + s;
                                    var t = setTimeout(startTime, 500);
                                }

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i
                                    }; // add zero in front of numbers < 10
                                    return i;
                                }
                            </script>
                        </div>
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-clock font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Anggaran</p>
                            <h4 class="mb-0">Rp 18.500.000.000,00</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-copy font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Realisasi</p>
                            <h4 class="mb-0">Rp -</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-archive font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Sisa Anggaran</p>
                            <h4 class="mb-0">Rp -</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-money-bill font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
