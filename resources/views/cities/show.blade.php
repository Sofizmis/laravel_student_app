@extends('layouts.app')

@section('title', 'City Details')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1 class="mb-2 text-white">City Details</h1>
            </div>
        </div>
        <div class="card bg-dark text-white mt-4">
            <div class="card-body border border-success rounded">
                <h5 class="card-title"><strong>Name:</strong> {{ $city->name }}</h5>
                <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
@endsection
