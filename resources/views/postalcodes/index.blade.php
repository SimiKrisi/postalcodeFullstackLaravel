@extends('layout')
@section('content')


<h1>Postal Codes
    <a href="{{ route('postalcodes.create') }}" class="button">Create New</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<ul>
    @foreach($postalcodes as $postalcode)
        <li class="actions">
            {{ $postalcode->code }} - {{ $postalcode->placename }}
            <a href="{{ route('postalcodes.show', $postalcode->id) }}" class="button">Show</a>
            <a href="{{ route('postalcodes.edit', $postalcode->id) }}" class="button">Edit</a>
            
            <form action="{{ route('postalcodes.destroy', $postalcode->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger" onclick="return confirm('You Sure To Delete?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection