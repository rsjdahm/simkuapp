<main data-topbar="dark" data-layout="horizontal">
    <div id="layout-wrapper">

        @include('components.header-auth')

        @include('components.topbar')

        <div class="main-content">
            <div class="page-content">
                <page></page>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ date('Y') }} © {{ config('app.name') }}
                            <span class="badge badge-pill badge-soft-primary font-size-12 ml-2"><i
                                    class="bx bx-check-double font-size-16 mr-1 align-middle"></i>
                                {{ config('app.meta.version') }}</span>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Dikembangkan oleh {{ config('app.meta.author_alias') }}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>
<script type="text/javascript">
    /// call initial page of auth layout: login page
    $(document).ready(function() {
        load('page', '{{ route('login') }}');
    });
</script>
