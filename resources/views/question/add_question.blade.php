@extends('layout.base')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Upload Student Feedback Theory  Question's</h5>
      <form action="{{ route('upload-question-theory') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" name="file">
          </div>
        </div>   
        <div class="row mb-3">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>

      </form>
      <h5 class="card-title">Upload Student Feedback Practical  Question's</h5>
      <form action="{{ route('upload-question-practical') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" name="file">
          </div>
        </div>   
        <div class="row mb-3">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>

      </form>

    </div>
  </div>
@endsection