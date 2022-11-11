<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box d-none d-lg-block">
                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img rel="preload" src="{{ asset('img/logo-mini-dark.svg') }}" alt="Logo SiMKU" height="32">
                    </span>
                    <span class="logo-lg">
                        <img rel="preload" src="{{ asset('img/logo-dark.svg') }}" alt="Logo SiMKU" height="36">
                    </span>
                </a>
                <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img rel="preload" src="{{ asset('img/logo-mini-light.svg') }}" alt="Logo SiMKU"
                            height="32">
                    </span>
                    <span class="logo-lg">
                        <img rel="preload" src="{{ asset('img/logo-light.svg') }}" alt="Logo SiMKU" height="36">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm font-size-16 header-item px-3" id="vertical-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="navbar-brand-box d-block d-lg-none">
                <a rel="preload" href="{{ route('home') }}" class="logo logo-dark">
                    <img src="{{ asset('img/logo-dark.svg') }}" alt="" height="36">
                </a>
                <a rel="preload" href="{{ route('home') }}" class="logo logo-light">
                    <img src="{{ asset('img/logo-light.svg') }}" alt="" height="36">
                </a>
            </div>
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Cari sesuatu di sini...">
                    <span class="fas fa-search"></span>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item" id="page-header-user-dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('img/logo-rsjd.png') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->nama }}</span>
                    <i class="fas fa-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <form id="logout_form" method="POST" action="{{ route('logout') }}">
                        <div class="dropdown-item">
                            <div class="avatar-md profile-user-wid mb-2">
                                <img src="{{ asset('img/logo-rsjd.png') }}" alt=""
                                    class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15">{{ Auth::user()->nama }}</h5>
                            <p class="text-muted mb-0">{{ Auth::user()->jabatan }}</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" href="{{ route('logout') }}">
                            <i class="fas fa-power-off text-danger mr-1 align-middle"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript">
    function change_color_sidebar() {
        if (992 <= $(window).width()) {
            $("main").attr("data-sidebar", "dark");
            $("main").removeAttr("data-topbar");
        } else {
            $("main").removeAttr("data-sidebar");
            $("main").attr("data-topbar", "dark");
        }
    }
    change_color_sidebar();
    $(window).on('resize', function() {
        change_color_sidebar();
    });
    $("#vertical-menu-btn").on("click", function(event) {
        event.preventDefault();
        $("main").toggleClass("sidebar-enable");
        if (992 <= $(window).width()) {
            $("main").toggleClass("vertical-collpsed");
        } else {
            $("main").removeClass("vertical-collpsed");
        }
    })
</script>
<script type="text/javascript">
    $("#logout_form").on("submit", function(event) {
        event.preventDefault();
        const form = $(this);
        const data = new FormData($(this)[0]);
        $.ajax({
            data,
            url: form.attr("action"),
            type: form.attr("method"),
            processData: false,
            contentType: false,
            success: function(response) {
                return load('#app', response);
            }
        });
        return false;
    });
</script>
