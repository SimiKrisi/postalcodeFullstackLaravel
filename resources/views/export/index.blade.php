@extends('layout')

@section('content')

<h1>Cities Export
    {{-- TODO: Implement Export Functionality --}}
    <a href="{{route('export.csv', request()->query())}}" class="button">Export to CSV</a> 
    <a href="{{route('export.pdf', request()->query())}}" class="button">Export to PDF</a>
    <form action="{{ route('export.sendEmail', request()->query()) }}" method="POST">
    @csrf
        <label for="emailaddress">Email Address:</label>
        <input type="email" name="emailaddress" id="emailaddress" required>
        <button type="submit" class="btn btn-primary">
            Send Email
        </button>
    </form>
</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div> 
@endif

<form action="{{route('export.index')}}" method="GET">
    @csrf
    
    <fieldset>
        <label for="placename">Place Name:</label>
        <input type="text" name="placename" id="placename" onchange="this.form.submit()" value="{{ request('placename') }}">
        
    </fieldset>
    <fieldset>
        <label for="code">Postal Code:</label>
        <input type="text" name="code" id="code" onchange="this.form.submit()" value="{{ request('code') }}">
        
    </fieldset>
    <fieldset>
        <label for="county_id">County:</label>
        <select name="county_id" id="county_id" onchange="this.form.submit()">
            <option value="">Select County</option>
            @foreach($counties as $county)
                <option value="{{ $county->id }}" {{ request('county_id') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Search</button>
</form>
<ul>
    @foreach($postalcodes as $postalcode)
        <li class="actions">
            {{ $postalcode->code }} - {{ $postalcode->placename }} ({{ $postalcode->county ? $postalcode->county->name : 'No County' }})
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