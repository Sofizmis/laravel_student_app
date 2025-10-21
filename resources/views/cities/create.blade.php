@extends('layouts.app')

@section('title', 'Add City')
@section('content')
    <h3>Create City</h3>
@endsection
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">

        <a href="{{ route('cities.index')}}" class="btn btn-outline-warning mt-2">Back</a>

            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-light rounded">
                    <form action="{{ route('cities.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" 
                                name="name" 
                                class="form-control bg-dark text-white 
                                @error('name') is-invalid @enderror"
                                value="{{old('name')}}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-success text-white">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
