@if (session()->has('message'))
    <div class="alert alert-{{ $type ?? 'info' }}">
        {{ $message }}
    </div>
@endif
