<link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<main data-topbar="dark">
    <div id="layout-wrapper">

        @include('components.header-dashboard')

        @include('components.sidebar')

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
    /// call initial page of auth layout: dashboard page
    $(document).ready(function() {
        load('page', '{{ route('dashboard.show') }}');
    });
</script>
<script type="text/javascript">
    /// hooks for anchor do
    $("body").on('click', 'a[do]', function(event) {
        const anchor = $(this);
        event.preventDefault();
        if (anchor.attr('do') == 'delete') {
            return deletor(anchor.attr('href'));
        }
        if (anchor.attr('do') == 'open-to-tab') {
            $(anchor.attr('target')).html('');
            load(anchor.attr('target'), anchor.attr('href'));
            $("a[href='" + anchor.attr('tab') + "'].nav-link").removeClass('disabled');
            $('.nav-tabs a[href="' + anchor.attr('tab') + '"]').tab('show');
        }
        if (anchor.attr('do') == 'back-to-tab') {
            $('.nav-tabs a[href="' + anchor.attr('tab') + '"]').tab('show');
        }
    });
    /// deletor data
    function deletor(href) {
        swal.fire({
            title: "Anda yakin akan menghapus data ini?",
            text: "Periksa kembali data anda sebelum menghapus.",
            type: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger mr-4",
            cancelButtonClass: "btn btn-secondary",
            confirmButtonText: "<i class='fas fa-trash'></i> Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: href,
                    type: "delete",
                    success: function(response) {
                        toastr.success(response.message);
                        $('table.datatable').DataTable().ajax.reload(null, false);
                    }
                });
            }
        });
    }
</script>
