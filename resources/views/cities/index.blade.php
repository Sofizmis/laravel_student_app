@extends('layouts.app')

@section('title', 'Cities List')
@section('content')

    <div class="container mt-4">
        <h2 class="mb-2 text-white">Cities List</h2>
        <a href="{{ route('cities.create') }}" class="btn btn-outline-info mb-3">Add City</a>
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession
        <table class="table table-bordered table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>
                            <a href="{{ route('cities.show', $city->id) }}" class="btn btn-outline-warning">View</a>
                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-outline-info">Edit</a>
                            {{-- <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure to delete city?')">
                                    Delete
                                </button>
                            </form> --}}

                            <button type="button" class="btn btn-outline-danger delete-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCityModal"
                                data-name="{{ $city->name }}"
                                data-route="{{ route('cities.destroy', $city->id)}}">
                                Delete
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="3" class="text-center">No cities found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $cities->links('vendor.pagination.bootstrap-5-dark') }}

    {{--Delete modal--}}
    <div class="modal fade" id="deleteCityModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Delete city?</h5>
                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <p>You're about to delete city:</p>
                    <p class="fw-bold fs-5" id="cityName"></p>
                    <p>This action cannot be reversed.</p>
                </div>
                <div class="modal-footer border-0">
                    <button
                        type="button"
                        class="btn btn-outline-light"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete city
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('deleteForm');
        const cityNameElem = document.getElementById('cityName');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const deleteUrl = this.dataset.route;
                const studentName = this.dataset.name;
                
                cityNameElem.textContent = cityName;
                deleteForm.action = deleteUrl;
            });
        });

    })
</script>
@endsection