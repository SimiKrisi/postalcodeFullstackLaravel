@extends('layout')

@section('content')

<h1>County Index 
    <a href="{{route('counties.create')}}" class="button">Create New</a>
</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div> 
@endif

<ul>
    @foreach($counties as $county)
        <li class="actions">
            {{ $county->name }}
            <a href="{{ route('counties.show', $county->id) }}" class="button">Show</a>
            <a href="{{ route('counties.edit', $county->id) }}" class="button">Edit</a>
            
            <form action="{{ route('counties.destroy', $county->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger" onclick="return confirm('You Sure To Delete?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

@endsection