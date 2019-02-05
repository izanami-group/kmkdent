@if(count($errors) > 0)
    <ul class="list-group mb-3">
        @foreach($errors->all() as $e)
            <li class="list-group-item list-group-item-danger">{{ $e }}</li>
        @endforeach
    </ul>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
