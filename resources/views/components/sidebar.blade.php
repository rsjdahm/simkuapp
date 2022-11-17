<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="sidebar">
                <li class="menu-title">Main</li>
                <li>
                    <a data-load="#page" data-menu="default" href="{{ route('dashboard.show') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-chart-bar"></i>
                        <span>Anggaran</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Penganggaran</span>
                            </a>
                            <ul class="sub-menu">
                                {{-- <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        RKA
                                    </a>
                                </li> --}}
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Rincian Belanja
                                    </a>
                                </li>
                                {{-- <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Rencana Kas
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file"></i>
                        <span>Penatausahaan</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Parameter</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Data Umum Unit/Sub Unit
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Potongan PFK
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Bank Tujuan
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Tata Usaha</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        SPM
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Pengesahan SPJ
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Bend. Pengeluaran</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Bukti GU
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        SPP
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        SPJ GU
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                                        Pajak
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                <li class="menu-title">Parameter</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-globe"></i>
                        <span>Global</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Organisasi</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('pegawai.index') }}">
                                        Data Pegawai
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Nomenklatur</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('urusan-bidang.index') }}">
                                        Urusan-Bidang
                                    </a>
                                </li>
                                <li>
                                    <a data-load="#page" data-menu="item" href="{{ route('program-kegiatan.index') }}">
                                        Program-Kegiatan
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a data-load="#page" data-menu="item" href="{{ route('unit-subunit.index') }}">
                                Unit/Subunit
                            </a>
                        </li>
                        <li>
                            <a data-load="#page" data-menu="item" href="{{ route('rekening.index') }}">
                                Rekening
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Admin</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-database"></i>
                        <span>Database</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a data-load="#page" data-menu="item" href="{{ route('migration.index') }}">
                                Migration
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#sidebar").metisMenu();

    $(document).ready(function() {
        // check if there is history then activate menu
        if (window.location.href.includes('/#/') && window.location.href.replace(BASE_URL + '/#', '') !=
            '/') {
            const new_url = BASE_URL + window.location.href.replace(BASE_URL + '/#', '');

            $(".metismenu .active").removeClass('active');

            $('a[data-menu][href="' + new_url + '"]')
                .addClass("active");
            $('a[data-menu][href="' + new_url + '"]')
                .parents('li').children('a').addClass('active');
            $('a[data-menu][href="' + new_url + '"]')
                .parents('li').addClass('mm-active active');
            $('a[data-menu][href="' + new_url + '"]')
                .parents('ul.sub-menu').addClass('mm-show');
        } else {
            // if no history
            $('a[data-menu="default"]').addClass('active').parents('li').addClass('mm-active active');
        }
    });

    $("body").on('click', 'a[data-menu]', function(event) {
        event.preventDefault();

        $(".metismenu .active").removeClass('active');

        $(this).addClass("active");
        $(this).parents('li').children('a').addClass('active');
        $(this).parents('li').addClass('mm-active active');
        $(this).parents('ul.sub-menu').addClass('mm-show');

        if ($('main').hasClass("sidebar-enable")) {
            $('main').removeClass('sidebar-enable');
        }
    });

    // save to history loader
    $("body").on('click', 'a[data-menu]', function(event) {
        event.preventDefault();
        const href = BASE_URL + '/#/' + $(this).attr('href').replace(BASE_URL + '/', '');
        window.history.pushState({
            href
        }, '', href)
    });

    $('main').click(function(event) {
        if ($('main').hasClass("sidebar-enable")) {
            var $target = $(event.target);
            if (!$target.closest('#sidebar').length &&
                !$target.closest('#vertical-menu-btn').length) {
                $('main').removeClass('sidebar-enable');
            }
        }
    });
</script>
