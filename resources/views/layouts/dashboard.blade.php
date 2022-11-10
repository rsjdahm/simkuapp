<link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<main data-topbar="dark">
    <div id="layout-wrapper">

        @include('components.header_dashboard')

        @include('components.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div id="page"></div>
            </div>

            @include('components.footer')
        </div>
    </div>
</main>

<script type="text/javascript">
    /// call initial page of auth layout: dashboard page
    $(document).ready(function() {
        load('#page', '{{ route('dashboard.show') }}');
    });
</script>
<script type="text/javascript">
    /// hooks for anchor do
    $("body").on('click', 'a[data-action]', function(event) {
        const anchor = $(this);
        event.preventDefault();
        if (anchor.data('action') == 'delete') {
            return deletor(anchor.attr('href'));
        }
        if (anchor.data('action') == 'open-tab') {
            $(anchor.data('target')).html('');
            load(anchor.data('target'), anchor.attr('href'));
            $("a[href='" + anchor.data('target') + "'].nav-link").removeClass('disabled');
            $('.nav-tabs a[href="' + anchor.data('target') + '"]').tab('show');
            // disabled next tab
            $("a[href='" + anchor.data('target') + "'].nav-link").parent().nextAll().children('a.nav-link')
                .addClass('disabled');
            $(anchor.data('target') + ".tab-pane").nextAll().html('');
        }
        if (anchor.data('action') == 'back-tab') {
            $("a[href='" + anchor.data('target') + "'].nav-link").parent().nextAll().children('a.nav-link')
                .addClass('disabled');
            $(anchor.data('target') + ".tab-pane").nextAll().html('');
            $('.nav-tabs a[href="' + anchor.data('target') + '"]').tab('show');
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
