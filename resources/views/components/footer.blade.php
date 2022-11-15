<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {{ date('Y') }} © {{ config('app.name') }}
                <span class="badge badge-pill badge-soft-success ml-2"><i class="fas fa-check mr-1 align-middle"></i>
                    {{ config('app.meta.version') }}</span>
            </div>
            <div class="col-sm-6">
                <div class="d-block text-right">
                    {{-- Dikembangkan oleh {{ config('app.meta.author_alias') }} --}}
                    by <img src="{{ asset('img/walid-mark.png') }}" width="75.8" height="20" />
                </div>
            </div>
        </div>
    </div>
</footer>
