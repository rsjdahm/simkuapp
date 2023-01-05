toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
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
$(document).ajaxError(function (event, xhr, settings, thrownError) {
    $("form").find("small.text-danger").remove();
    $("form").find("input, textarea, .select2-selection").css("box-shadow", "");

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
                    input.css("box-shadow", "inset 0 -1px 0 red");
                    input.after(
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
                    input.css("box-shadow", "inset 0 -1px 0 red");
                    input.after(
                        `<small class="text-danger">${messages}</small>`
                    );
                }
            } else {
                const input = $('[name="' + name + '"]');
                if (input.is("select")) {
                    input
                        .siblings("span.select2.select2-container")
                        .children("span.selection")
                        .children(".select2-selection")
                        .css("box-shadow", "inset 0 -1px 0 red");

                    input
                        .siblings("span.select2.select2-container")
                        .after(
                            `<small class="text-danger">${messages}</small>`
                        );
                } else {
                    input.css("box-shadow", "inset 0 -1px 0 red");
                    input.after(
                        `<small class="text-danger">${messages}</small>`
                    );
                }
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

function load(parent, url, callback) {
    $.ajax({
        url,
        beforeSend: function () {
            NProgress.start();
        },
        success: function (response) {
            $(parent).html(response);
            $(parent).attr("data-href", url);
            $("main select, .modal-body select")
                .css("width", "100%")
                .select2({
                    templateResult: function (data, container) {
                        if (!data.element) {
                            return data.text;
                        }
                        const $element = $(data.element);
                        const $wrapper = $("<span></span>");
                        $wrapper.html(data.text);
                        $(container)
                            .addClass($element[0].className)
                            .attr("style", $($element[0]).attr("style"));
                        return $wrapper;
                    },
                });
            if (callback) callback();
            NProgress.done();
        },
        error: function (xhr) {
            if (xhr.status == 404) {
                return $(parent).html(
                    '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-triangle text-danger mb-3"></i><br/><h5 class="text-center"><strong>404</strong> Not Found</h5></div>'
                );
            } else if (xhr.status == 500) {
                return $(parent).html(
                    '<div class="text-center py-4"><i style="font-size: 52pt" class="fas fa-exclamation-circle text-danger mb-3"></i><br/><h5 class="text-center"><strong>500</strong> Internal Server Error</h5></div>'
                );
            }
        },
    });
}
function loadPdf(parent, url) {
    $.ajax({
        url: url,
        xhrFields: {
            responseType: "blob",
        },
        success: function (data) {
            const blob = new Blob([data], { type: "application/pdf" });
            const href = window.URL.createObjectURL(blob);

            return $(parent)
                .html(`<object data="${href}" type="application/pdf" width="100%" height="100%">
                <p>Browser tidak support menampilkan PDF.
                    <a href="${url}">Klik Di Sini untuk Download</a>
                </p>
            </object>`);
        },
    });
}

function modal(title, url, size) {
    $(".modal.fade").not(".modal.fade.show").remove();
    $("body").append(
        `<div data-href="${url}" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ${
                    size ? `modal-${size}` : ""
                }" role="document"">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white font-weight-bold">${title}</h5>
                            <div>
                                <button type="button" class="btn btn-sm btn-primary" onclick="return load('div.modal[data-href=&quot;${url}&quot;] .modal-body', '${url}');">
                                    <span aria-hidden="true">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
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
    return load(
        'div.modal[data-href="' + url + '"] .modal-body',
        url,
        function () {
            $('div.modal[data-href="' + url + '"] .modal-body')
                .find("[autofocus]")
                .focus();
        }
    );
}
function modalPdf(title, url) {
    return window.open(url, title, "width=1024,height=768");
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
    if (
        !a.data("menu") &&
        a.data("load") != "modal" &&
        a.data("load") != "modal-pdf"
    ) {
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
