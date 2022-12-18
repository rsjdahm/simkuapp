NProgress.configure({
    template:
        '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-container"><img rel="preload" height="60" width="60" src="../img/loader.gif" alt="Loading..."/></div></div>',
    // template:
    //     '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-container"><div class="spinner-icon"></div></div></div>',
});

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    // positionClass: "toast-top-center",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "6000",
    extendedTimeOut: "3000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document)
    .ajaxStart(function () {
        NProgress.start();
        $("form").find("small.text-danger").remove();
        $("form").find("[name].border-danger").removeClass("border-danger");
    })
    .ajaxComplete(function () {
        NProgress.done();
    })
    .ajaxError(function (event, xhr, settings, thrownError) {
        NProgress.done();

        if (xhr.readyState == 0) {
            return toastr.error(
                "Koneksi ke server terputus. Silakan periksa koneksi internet Anda atau hubungi administrator jika masalah tetap berlanjut."
            );
        }

        var message = xhr?.responseJSON?.message
            ? xhr.responseJSON.message
            : JSON.stringify(xhr);

        if (xhr.status == 422) {
            var iter = 0;
            message = "<li>";

            $.each(xhr.responseJSON.errors, function (name, messages) {
                if (iter) {
                    message += "<li>";
                }
                message += messages.join("</li>");
                iter++;
                if (name.includes(".")) {
                    name = name.split(".");

                    if (name.length < 3) {
                        const input = $('[name^="' + name[0] + '[]"]');
                        input
                            .addClass("border-danger")
                            .after(
                                `<small class="text-danger">${messages}</small>`
                            );
                    } else {
                        const input = $(
                            '[name^="' +
                                name[0] +
                                "[" +
                                name[1] +
                                "][" +
                                name[2] +
                                ']"]'
                        );
                        input
                            .addClass("border-danger")
                            .after(
                                `<small class="text-danger">${messages}</small>`
                            );
                    }
                } else {
                    const input = $('[name="' + name + '"]');
                    input
                        .addClass("border-danger")
                        .after(
                            `<small class="text-danger">${messages}</small>`
                        );
                }
            });
            message += "</ul>";
            return toastr.error(xhr.responseJSON.message);
        } else if (xhr.status == 401) {
            message =
                "Sesi login habis, silakan login kembali." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            load("#app", $('meta[name="auth-url"]').attr("content"));
            return toastr.error(message);
        } else if (xhr.status == 419) {
            message =
                "Sesi habis, silakan muat ulang browser." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            return toastr.error(message);
        } else if (xhr.status == 500) {
            message =
                "Terjadi kesalahan, silakan muat ulang browser Anda dan hubungi Admin jika masalah masih berlanjut." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            return toastr.error(message);
        } else if (xhr.status == 403) {
            message =
                "Anda tidak diizinkan untuk melakukan aksi ini." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            return toastr.error(message);
        }
    });

/// script global app and page loader
function load(parent, url, callback) {
    $.ajax({
        url,
        success: function (response) {
            $(parent).html(response);
            $(parent).attr("data-href", url);
            // $('main select, .modal-body select').not('.dataTables_length select').css('width', '100%').select2();
            $("main select, .modal-body select")
                .css("width", "100%")
                .select2({
                    templateResult: function (data, container) {
                        // We only really care if there is an element to pull classes from
                        if (!data.element) {
                            return data.text;
                        }

                        const $element = $(data.element);

                        const $wrapper = $("<span></span>");
                        // $wrapper.addClass($element[0].className);
                        $wrapper.text(data.text);

                        $(container)
                            .addClass($element[0].className)
                            .attr("style", $($element[0]).attr("style"));

                        return $wrapper;
                    },
                });
            if (callback) {
                callback();
            }
        },
        error: function (xhr) {
            if (xhr.status == 404) {
                $(parent).html(
                    '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-triangle text-danger mb-3"></i><br/><h5 class="text-center"><strong>404</strong> Not Found</h5></div>'
                );
            } else if (xhr.status == 500) {
                $(parent).html(
                    '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-circle text-danger mb-3"></i><br/><h5 class="text-center"><strong>500</strong> Internal Server Error</h5></div>'
                );
            }
        },
    });
}
function loadPdf(parent, url) {
    $(parent)
        .html(`<object data="${url}" type="application/pdf" width="100%" height="100%">
                <p>Browser tidak support menampilkan PDF.
                    <a href="${url}">Klik Di Sini untuk Download</a>
                </p>
            </object>`);
}
/// global loader modal
function modal(title, url, size) {
    $(".modal.fade").not(".modal.fade.show").remove();
    $("body").append(
        `<div data-href="${url}" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ${
                    size ? `modal-${size}` : ""
                }" role="document" style="max-width: 700px;">
                    <div style="resize: both; overflow: hidden; min-width: 100px; min-height: 300px;" class="modal-content border-0">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white font-weight-bold">${title}</h5>
                            <div>
                                <button type="button" class="btn btn-sm btn-primary" onclick="return load('div.modal[data-href=&quot;${url}&quot;] .modal-body', '${url}');">
                                    <span aria-hidden="true">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div style="overflow: auto;" class="modal-body"></div>
                    </div>
                </div>
            </div>`
    );
    $('div.modal[data-href="' + url + '"]').modal("toggle");
    $('div.modal[data-href="' + url + '"]').draggable({
        cursor: "move",
        handle: ".modal-header",
    });
    load('div.modal[data-href="' + url + '"] .modal-body', url);
}
function modalPdf(title, url) {
    $(".modal.fade").not(".modal.fade.show").remove();
    $("body").append(
        `<div data-href="${url}" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="min-width: calc(100vw - 20rem);">
                    <div class="modal-content border-0" style="height: 90vh;">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white font-weight-bold">${title}</h5>
                            <div>
                                <a href="${url}" title="Download PDF" target="_blank" class="btn btn-sm btn-primary">
                                    <span aria-hidden="true">
                                        <i class="fas fa-download"></i>
                                    </span>
                                </a>
                                <button type="button" class="btn btn-sm btn-primary" onclick="return loadPdf('div.modal[data-href=&quot;${url}&quot;] .modal-body', '${url}');">
                                    <span aria-hidden="true">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body p-0"></div>
                    </div>
                </div>
            </div>`
    );
    $('div.modal[data-href="' + url + '"]').modal("toggle");
    $('div.modal[data-href="' + url + '"]').draggable({
        cursor: "move",
        handle: ".modal-header",
    });
    loadPdf('div.modal[data-href="' + url + '"] .modal-body', url);
}

$(document).on("select2:open", () => {
    document.querySelector(".select2-search__field").focus();
});

/// call initial layout berdasarkan status guest/loggedin
$(document).ready(function () {
    load("#app", $('meta[name="init-url"]').attr("content"));
});

/// hook for anchor
$("body").on("click", "a[data-load]", function (event) {
    const a = $(this);
    event.preventDefault();
    if (!a.data("menu")) {
        return load(a.data("load"), a.attr("href"));
    }
});
$("body").on("click", "a[data-load='modal']", function (event) {
    const a = $(this);
    event.preventDefault();
    return modal(a.attr("title"), a.attr("href"), a.data("size"));
});
$("body").on("click", "a[data-load='modal-pdf']", function (event) {
    const a = $(this);
    event.preventDefault();
    return modalPdf(a.attr("title"), a.attr("href"));
});
