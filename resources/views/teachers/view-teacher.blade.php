@extends('layout.base')
@section('content')
<div class="container">
    <h2>Teachers</h1>

    <table class="table">
        <thead>
            <tr>
            <th>Department</th>
            <th>Year</th>
                <th>Division</th>
                
                <th>Teacher Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->dept_name }}</td>
                    <td>{{ $teacher->Year }}</td>
                    <td>{{ $teacher->division }}</td>
                    <td>{{ $teacher->teacher }}
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
