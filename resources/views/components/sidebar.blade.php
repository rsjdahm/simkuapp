<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="sidebar">
                <li class="menu-title">Main</li>
                <li>
                    <a load="page" menu="default" href="{{ route('dashboard.show') }}">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-bar-chart-alt-2"></i>
                        <span>Anggaran</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Penganggaran PD</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        RKA PD
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Rincian Belanja PD
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Rencana Kas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
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
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Data Umum Unit/Sub Unit
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Potongan PFK
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
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
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        SPM
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
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
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Bukti GU
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        SPP
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        SPJ GU
                                    </a>
                                </li>
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
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
                        <i class="bx bx-globe"></i>
                        <span>Global</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Organisasi</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a load="page" menu="item" href="{{ route('pegawai.index') }}">
                                        Data Pegawai
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a load="page" menu="item" href="{{ route('rekening.index') }}">
                                Rekening
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-terminal"></i>
                        <span>SiMKU</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span>Organisasi</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a load="page" menu="item" href="{{ route('test') }}">
                                        Data Pegawai
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#sidebar").metisMenu();

    $(document).ready(function() {
        $('a[menu="default"]').addClass('active').parents('li').addClass('mm-active active');
    });

    $("body").on('click', 'a[menu]', function(event) {
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
