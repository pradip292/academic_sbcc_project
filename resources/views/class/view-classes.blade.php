@extends('layout.base')
@section('content')
<div class="container">
    <h2>Classes</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Division</th>
                <th>Year</th>
                <th>Department</th>
                <th>Actions</th> <!-- New column for the delete button -->
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            @if ($class->deactivated == 1)
                <tr>
                    <td>{{ $class->division }}</td>
                    <td>{{ $class->Year }}</td>
                    <td>{{ $class->dept_name }}</td>
                    <td>
                        <form action="{{ route('classes.deactivate', $class->id) }}" method="POST">
                            @csrf
                            @method('PATCH') <!-- Use PATCH method for soft delete -->
                            <button type="submit" class="btn btn-danger">Deactivate</button>
                        </form>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
