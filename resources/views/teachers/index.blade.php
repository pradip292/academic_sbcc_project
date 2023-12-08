@extends('layout.base')

@section('content')
<div class="container">
    <h2>Subjects</h2>
    <!-- Search Form -->
    <form action="{{ route('teachers.search') }}" method="GET" class="form-inline mb-2">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search Teacher"><br>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Table to Display Results -->
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
            @if (count($teachers) > 0)
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->dept_name }}</td>
                        <td>{{ $teacher->year }}</td>
                        <td>{{ $teacher->division }}</td>
                        <td>{{ $teacher->teacher }}</td>
                        <td>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No matching teachers found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
