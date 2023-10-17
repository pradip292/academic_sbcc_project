@extends('layout.base')
@section('content')
<div class="container">
    <h2>Classes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Division</th>
                <th>Year</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->division }}</td>
                    <td>{{ $class->year }}</td>
                    <td>{{ $class->dept_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
