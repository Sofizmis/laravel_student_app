@extends('layouts.app')

@section('title', 'Admin Panels')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="text-white mb-4">Welcome to Admin Dashboard</h1>
    <p class="text-secondary fs-5 mb-5">Choose a panel to manage data:</p>

    <div class="d-flex justify-content-center gap-4">
        <a href="{{ route('students.index') }}" class="btn btn-outline-info btn-lg px-5">
            Students Panel
        </a>
        <a href="{{ route('cities.index') }}" class="btn btn-outline-warning btn-lg px-5">
            Cities Panel
        </a>
    </div>
</div>
@endsection