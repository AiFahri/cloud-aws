@extends('layout')
@section('content')
<h4>Upload File</h4>
<form action="/files" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" class="form-control mb-3" required>
  <button class="btn btn-success">Upload</button>
</form>

@if(session('success'))
  <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<h5 class="mt-4">Uploaded Files</h5>
<ul>
@foreach($files as $f)
  <li>{{ basename($f) }}</li>
@endforeach
</ul>
@endsection
