<main data-topbar="colored">
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
    $(document).ready(function() {
        const hash = (new URLSearchParams(window.location.search)).get('route');
        if (hash) {
            return load('#page', BASE_URL + '/' + hash);
        } else {
            return load('#page', '{{ route('dashboard.show') }}');
        }

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
        if (anchor.data('action') == 'post') {
            return poster(anchor.attr('href'));
        }
        if (anchor.data('action') == 'reload') {
            load($(anchor).closest('[data-href]'), $(anchor).closest('[data-href]').data('href'));
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

    function poster(href) {
        swal.fire({
            title: "Anda yakin akan posting data ini?",
            text: "Periksa kembali data anda sebelum posting.",
            type: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: "btn btn-warning mr-4",
            cancelButtonClass: "btn btn-secondary",
            confirmButtonText: "<i class='fas fa-upload'></i> Posting",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: href,
                    type: "post",
                    success: function(response) {
                        toastr.success(response.message);
                        $('table.datatable').DataTable().ajax.reload(null, false);
                    }
                });
            }
        });
    }
</script>
