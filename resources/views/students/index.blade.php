@extends('layouts.app')

@section('title', 'Students List')
@section('content')

    <div class="container mt-4">
        <h2 class="mb-2 text-white">Students List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Student</a>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->city->name }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-warning">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-info">Edit</a>
                            {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure to delete student?')">
                                    Delete
                                </button>
                            </form> --}}

                            <button type="button" class="btn btn-outline-danger delete-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteStudentModal"
                                data-name="{{ $student->name }}"
                                data-route="{{ route('students.destroy', $student->id)}}">
                                Delete
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No students found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $students->links('vendor.pagination.bootstrap-5-dark') }}

    {{--Delete modal--}}
    <div class="modal fade" id="deleteStudentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Delete Student?</h5>
                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <p>You're about to delete student:</p>
                    <p class="fw-bold fs-5" id="studentName"></p>
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
                            Delete student
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
        const studentNameElem = document.getElementById('studentName');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const deleteUrl = this.dataset.route;
                const studentName = this.dataset.name;
                
                studentNameElem.textContent = studentName;
                deleteForm.action = deleteUrl;
            });
        });

    })
</script>
@endsection