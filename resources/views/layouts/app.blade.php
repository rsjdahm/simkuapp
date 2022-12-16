<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="{{ config('app.meta.description') }}" name="description" />
    <meta content="{{ config('app.meta.author') }}" name="author" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="theme-color" content="#2a3042">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="auth-url" content="{{ route('auth') }}" />
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800;900&display=swap" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap.min.css' . '?v=' . Str::random(4)) }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/bootstrap.min.css' . '?v=' . Str::random(4)) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" /> --}}
    <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css' . '?v=' . Str::random(8)) }}" rel="stylesheet" type="text/css" />

    <script>
        var txt = "{{ config('app.name') }} - ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>
</head>

<body>
    <div id="app"></div>

    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('js/app.js' . '?v=' . Str::random(8)) }}"></script>
    <script type="text/javascript">
        var BASE_URL = "{{ url('/') }}";
        /// script global app and page loader
        function load(parent, url, callback) {
            $.ajax({
                url,
                success: function(response) {
                    $(parent).html(response);
                    $(parent).attr('data-href', url);
                    $('main select, .modal-body select').not('.dataTables_length select').css(
                        'width', '100%').select2();
                    if (callback) {
                        callback();
                    }
                },
                error: function(xhr) {
                    if (xhr.status == 404) {
                        $(parent).html(
                            '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-triangle text-danger mb-3"></i><br/><h5 class="text-center"><strong>404</strong> Not Found</h5></div>'
                        );
                    } else if (xhr.status == 500) {
                        $(parent).html(
                            '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-circle text-danger mb-3"></i><br/><h5 class="text-center"><strong>500</strong> Internal Server Error</h5></div>'
                        );
                    }
                }
            });
        }
        /// global loader modal
        function modal(title, url, size) {
            $(".modal.fade").not(".modal.fade.show").remove();
            $("body").append(
                `<div data-href="${url}" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ${size ? `modal-${size}` : ""}" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white font-weight-bold">${title}</h5>
                                <div>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                                    <button type="button" class="close text-white mr-1" onclick="return load('div.modal[data-href=&quot;${url}&quot;] .modal-body', '${url}');">
                                        <span aria-hidden="true">
                                            <i class="fas fa-sync-alt"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body"></div>
                        </div>
                    </div>
                </div>`
            );
            $('div.modal[data-href="' + url + '"]').modal("toggle");
            load('div.modal[data-href="' + url + '"] .modal-body', url);
        }
    </script>
    <script type="text/javascript">
        /// call initial layout berdasarkan status guest/loggedin
        $(document).ready(function() {
            load('#app', '{{ Auth::check() ? route('dashboard') : route('auth') }}');
        });
        /// hook for anchor
        $("body").on('click', 'a[data-load]', function(event) {
            const anchor = $(this);
            event.preventDefault();
            if (anchor.data('load') == 'modal') {
                return modal(anchor.attr('title'), anchor.attr('href'), anchor.data('size'));
            }
            // exception for menu link
            if (!anchor.data('menu')) {
                return load(anchor.data('load'), anchor.attr('href'));
            }
        });
    </script>
</body>

</html>
