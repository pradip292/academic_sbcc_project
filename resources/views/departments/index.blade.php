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
                <tr>
                    <td>{{ $department->dept_name }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Department Button -->
    <a href="{{ route('add-department') }}" class="btn btn-primary">Add</a>
</div>
@endsection
