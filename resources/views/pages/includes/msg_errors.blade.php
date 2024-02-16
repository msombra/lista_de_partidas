@if ($errors->has($campo))
    @foreach ($errors->get($campo) as $e)
        <small class="text-danger"><i>{{ $e }}</i></small>
    @endforeach
@endif
