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
        $("form").find("span.invalid-feedback").remove();
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
                                `<span style="display: block !important;" class="invalid-feedback">${messages}</span>`
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
                                `<span style="display: block !important;" class="invalid-feedback">${messages}</span>`
                            );
                    }
                } else {
                    const input = $('[name="' + name + '"]');
                    input
                        .addClass("border-danger")
                        .after(
                            `<span style="display: block !important;" class="invalid-feedback">${messages}</span>`
                        );
                }
            });
            message += "</ul>";
            return toastr.error(xhr.responseJSON.message);
        } else if (xhr.status == 401 || xhr.status == 419) {
            message =
                "Sesi login habis, silakan login kembali." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            load("app", $('meta[name="auth-url"]').attr("content"));
            return toastr.error(message);
        } else if (xhr.status == 500) {
            message =
                "Terjadi kesalahan, silakan muat ulang browser Anda dan hubungi Admin jika masalah masih berlanjut." +
                "<br /><br />" +
                "<i>" +
                xhr.responseJSON.message +
                "</i>";
            return toastr.error(message);
        }
    });
