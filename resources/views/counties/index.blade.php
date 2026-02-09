@extends('layout')

@section('content')

<h1>County Index</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div> 
@endif

<ul>
    @foreach($counties as $county)
        <li>
            {{ $county->name }}
            <a href="{{ route('counties.edit', $county->id) }}" class="button">Edit</a>
            <a href="{{ route('counties.show', $county->id) }}" class="button">Show</a>
            <form action="{{ route('counties.destroy', $county->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('You Sure To Delete?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

@endsection