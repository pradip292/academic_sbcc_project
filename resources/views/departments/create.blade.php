@extends('layout.base')
@section('content')
<div class="container">
    <h1>Add Department</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{  route('add-department') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="dept_name">Department Name</label>
            <input type="text" name="dept_name" id="dept_name" class="form-control @error('dept_name') is-invalid @enderror" value="{{ old('dept_name') }}">
            @error('dept_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
