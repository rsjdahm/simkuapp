<div class="container pt-5">
    <div class="row justify-content-center pt-4">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="position-relative" style="z-index: 2;">
                <div class="avatar-md profile-user-wid mx-auto mb-2">
                    <span class="avatar-title rounded-circle bg-light shadow-sm">
                        <img src="{{ asset('img/logo-rsjd.png') }}" alt="" class="rounded-circle" height="64">
                    </span>
                </div>
            </div>

            <div class="card mt-n5 overflow-hidden pt-5">
                <div class="card-body p-4">
                    <form id="login_form" class="form-horizontal" method="post" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group text-center">
                            <strong>{{ config('app.meta.description') }}</strong>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                </div>
                                <input name="email" type="email" class="form-control"
                                    placeholder="{{ __('Email') }}" required />
                                @error('email')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bx-key"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control"
                                    placeholder="{{ __('Password') }}" required />
                                @error('password')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input name="remember" checked type="checkbox" class="custom-control-input" id="remember">
                            <label class="custom-control-label" for="remember">{{ __('Remember me') }}</label>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-lg btn-primary btn-block waves-effect waves-light" type="submit">
                                <i class="bx bx-right-arrow-circle"></i>
                                {{ __('Log in') }}
                            </button>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="mt-4 text-center">
                                <a load="page" href="{{ route('password.request') }}" class="text-muted">
                                    <i class="mdi mdi-lock mr-1"></i>
                                    {{ __('Forgot your password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#login_form").on("submit", function(event) {
        event.preventDefault();
        const form = $(this);
        const data = new FormData($(this)[0]);
        $.ajax({
            data,
            url: form.attr("action"),
            type: form.attr("method"),
            processData: false,
            contentType: false,
            success: function(response) {
                return load('app', response);
            }
        });
        return false;
    });
</script>
