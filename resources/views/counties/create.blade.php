@extends('layout')

@section('content')

<h1>Create County</h1>

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{route('counties.store')}}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        
    </fieldset>
    <button type="submit">Create</button>
</form>

@endsection