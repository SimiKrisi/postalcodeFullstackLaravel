@extends('layout')

@section('content')

<h1>Create Postal Code</h1>

@if($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{route('postalcodes.store')}}" method="POST">
    @csrf
    <fieldset>
        <label for="placename">Place Name:</label>
        <input type="text" name="placename" id="placename">
        
    </fieldset>
    <fieldset>
        <label for="code">Postal Code:</label>
        <input type="text" name="code" id="code">
        
    </fieldset>
    <fieldset>
        <label for="county_id">County:</label>
        <select name="county_id" id="county_id">
            <option value="">Select County</option>
            @foreach($counties as $county)
                <option value="{{ $county->id }}">{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Create</button>
</form>

@endsection