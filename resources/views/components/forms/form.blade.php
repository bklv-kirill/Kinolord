<form action="{{ $action }}" method="{{ $method !== 'GET' ? 'POST' : 'GET' }}">
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
