@foreach(['danger', 'warning', 'info', 'success', 'primary'] as $msg)
    @if( session() -> has($msg))
        <div class="alert alert-{{ $msg }}">
            {{ session() -> get($msg) }}
        </div>
        {{ session() -> forget($msg) }}
    @endif
@endforeach