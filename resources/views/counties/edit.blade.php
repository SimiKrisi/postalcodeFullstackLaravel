@extends('layout')
@section('content')
@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<form action="{{route('counties.update', $county->id)}}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{old('name',$county->name)}}">
        <button type="submit">Update</button>
    </fieldset>
</form>
@endsection