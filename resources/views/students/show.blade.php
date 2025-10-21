@extends('layouts.app')

@section('title', 'Student Details')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1 class="mb-2 text-white">Student Details</h1>
            </div>
        </div>
        <div class="card bg-dark text-white mt-4">
            <div class="card-body border border-success rounded">
                <h5 class="card-title"><strong>Name:</strong> {{ $student->name }}</h5>
                <h5 class="card-text"><strong>Email:</strong> {{ $student->email }}</h5>
                <h5 class="card-text"><strong>Phone:</strong> {{ $student->phone }}</h5>
                <h5 class="card-title"><strong>Address:</strong> {{ $student->address }}</h5>
                <h5 class="card-text"><strong>City:</strong> {{ $student->city->name }}</h5>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
@endsection
