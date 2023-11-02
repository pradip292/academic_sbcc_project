@extends('layout.base')

<!-- Include SweetAlert2 CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Include Axios (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@section('content')
<div class="container">
    <h1>Departments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department)
        @if ($department->deactivated == 1)
            <tr>
                <td>{{ $department->dept_name }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger delete-button" data-department-id="{{ $department->id }}">Delete</button>
                    </div>
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
    </table>

    <!-- Add Department Button -->
    <a href="{{ route('add-department') }}" class="btn btn-primary">Add</a>
</div>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const departmentId = this.getAttribute('data-department-id');
            console.log('Department ID:', departmentId);


            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Once you delete the department, all divisions and teachers associated with it will also be deleted. Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send an AJAX request to delete the department
                    axios.delete(`{{ route('departments.destroy', ['department' => '']) }}/${departmentId}`)




                        .then(response => {
                            // Handle success
                            if (response.data.success) {
                                Swal.fire('Success', 'Department deactivated successfully', 'success');
                                // Reload the page or update the department list as needed
                            }
                        })
                        .catch(error => {
                            // Handle error
                            Swal.fire('Error', 'Failed to delete department', 'error');
                        });
                }
            });
        });
    });
</script>

@endsection
