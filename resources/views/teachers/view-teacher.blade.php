@extends('layout.base')

@section('content')
<div class="container">
    <h2>Subjects</h2>

    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('teachers.search') }}" method="GET">
            <div class="input-group">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Department</th>
                <th>Year</th>
                <th>Division</th>
                <th>Subject Name</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            @if ($teacher->deactivated == 1)
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
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
