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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/nprogress/nprogress.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css' . '?v=' . time()) }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <app></app>

    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('js/app.js' . '?v=' . time()) }}"></script>
    <script type="text/javascript">
        /// script global app and page loader
        function load(container, url) {
            $.ajax({
                url
            }).then(function(response) {
                $(container).html(response);
            });
        }
        /// global loader modal
        function modal(title, url, size) {
            $(".modal.fade").not(".modal.fade.show").remove();
            $("body").append(
                `<div page="${url}" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ${size ? `modal-${size}` : ""}" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold">${title}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <modal_page></modal_page>
                            </div>
                        </div>
                    </div>
                </div>`
            );
            $('div.modal[page="' + url + '"]').modal("toggle");
            load('div.modal[page="' + url + '"] modal_page', url);
        }
    </script>
    <script type="text/javascript">
        /// call initial layout berdasarkan status guest/loggedin
        $(document).ready(function() {
            load('app', '{{ Auth::check() ? route('dashboard') : route('auth') }}');
        });
        /// hook for anchor
        $("body").on('click', 'a[load]', function(event) {
            const anchor = $(this);
            event.preventDefault();
            if (anchor.attr('load') == 'modal') {
                return modal(anchor.attr('title'), anchor.attr('href'), anchor.attr('modal-size'));
            }
            return load(anchor.attr('load'), anchor.attr('href'));
        });
    </script>
</body>

</html>
