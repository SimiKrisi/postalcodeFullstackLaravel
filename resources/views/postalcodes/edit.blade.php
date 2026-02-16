@extends('layout')
@section('content')
@error('placename')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<form action="{{route('postalcodes.update', $postalcode->id)}}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="placename">Place Name:</label>
        <input type="text" name="placename" id="placename" value="{{old('placename',$postalcode->placename)}}">
        
    </fieldset>
    <fieldset>
        <label for="code">Postal Code:</label>
        <input type="text" name="code" id="code" value="{{old('code',$postalcode->code)}}">
        
    </fieldset>
    <fieldset>
        <label for="county_id">County:</label>
        <select name="county_id" id="county_id">
            <option value="">Select County</option>
            @foreach($counties as $county)
                <option value="{{ $county->id }}" {{ old('county_id', $postalcode->county_id) == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Update</button>
</form>
@endsection