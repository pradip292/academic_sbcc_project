@extends('layout.base')


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
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary equal-button">Edit</a>
                        <br>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger equal-button">Delete</button>
                        </form>
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

<style>
    .equal-button {
        width: 100px; /* Adjust the width to your desired size */
    }
</style>
@endsection
