@extends('layout')

@section('content')
<h1>"{{$postalcode->placename}}" Postal Code details</h1>
<h2>Postal Code ID: {{$postalcode->id}}</h2>
<h2>Postal Code: {{$postalcode->code}}</h2>
<h2>County: 
    @if($postalcode->county)
        <a href="{{ route('counties.show', $postalcode->county->id) }}">{{ $postalcode->county->name }}</a>
    @else
        No County Assigned
    @endif
</h2>
<h2>Created At: {{$postalcode->created_at}}</h2>
<h2>Updated At: {{$postalcode->updated_at}}</h2>

@endsection