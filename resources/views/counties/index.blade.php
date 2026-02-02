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
        <li>{{ $county->id }} - {{ $county->name }}</li>
    @endforeach
</ul>

@endsection