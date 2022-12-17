<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="bg-light px-3 py-3">
            <div class="row">
                <div class="col-3">
                    <span style="line-height: 36px; font-weight: bold;">Modul:</span>
                </div>
                <div class="col-9">
                    <select name="module-menu" class="form-control" style="width: 100%;">
                        {{-- <option disabled selected>-- Pilih Modul --</option> --}}
                        <option value="administrator">Administrator</option>
                        <option value="setup" selected>Setup</option>
                        {{-- <option value="penatausahaan">Penatausahaan</option> --}}
                    </select>
                </div>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="sidebar"></ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        const module = (new URLSearchParams(window.location.search)).get('module');
        if (module) {
            $("select[name='module-menu']").val(module).change();
        } else {
            if ($("select[name='module-menu']").val()) {
                $("select[name='module-menu']").val($("select[name='module-menu']").val()).change();
            }
        }
    });

    function activateMenu() {
        const hash = (new URLSearchParams(window.location.search)).get('route');
        if (hash) {
            const new_url = BASE_URL + '/' + hash;

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
    }

    // save to history loader
    $("body").on('click', 'a[data-menu]', function(event) {
        event.preventDefault();
        const anchor = $(this);

        load(anchor.data('load'), anchor.attr('href'), function() {
            let url = new URL(window.location);
            url.searchParams.set('route', anchor.attr('href').replace(BASE_URL + '/', ''));
            window.history.pushState({}, '', url)
            activateMenu();
        });
    });

    $('main').click(function(event) {
        if ($('main').hasClass("sidebar-enable")) {
            var $target = $(event.target);
            if (!$target.closest('.vertical-menu').length &&
                !$target.closest('#vertical-menu-btn').length) {
                $('main').removeClass('sidebar-enable');
            }
        }
    });

    $("select[name='module-menu']").change(function() {
        const val = $(this).val();
        const url = "{{ route('menu-modul') }}" + "/" + val;
        $("#sidebar").metisMenu('dispose');
        load('#sidebar', url, function() {
            let url = new URL(window.location);
            url.searchParams.set('module', val);
            window.history.pushState({}, '', url)
            $("#sidebar").metisMenu();

            activateMenu();
        });
    });
</script>
