<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                Copyright © {{ date('Y') }} {{ config('app.meta.company') }}
                {{-- <span
                class="badge badge-pill badge-soft-success ml-2"><i
                    class="fas fa-check mr-1 align-middle"></i><strong>{{ config('app.meta.name') }}</strong> |
                V{{ config('app.meta.version') }}</span> --}}
            </div>
            <div class="col-sm-6">

                <div class="text-sm-right d-block">
                    {{-- Dikembangkan oleh {{ config('app.meta.author_alias') }} --}}
                    {{-- by <img src="{{ asset('img/walid-mark.png') }}" width="75.8" height="20" /> --}}
                    <span class="badge badge-pill badge-soft-success"><i
                            class="fas fa-check mr-1 align-middle"></i><strong>{{ config('app.meta.name') }}</strong> |
                        V{{ config('app.meta.version') }}</span>
                </div>
            </div>
        </div>
    </div>
</footer>
