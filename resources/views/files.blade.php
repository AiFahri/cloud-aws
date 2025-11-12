@extends('layout')
@section('content')
<h4>Upload File</h4>
<form action="/files" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" class="form-control mb-3 @error('file') is-invalid @enderror" required accept="image/*,application/pdf,.doc,.docx,.txt,.zip,.rar">
  @if($errors->any())
    <div class="alert alert-danger mb-3">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <button class="btn btn-success">Upload</button>
</form>

@if(session('success'))
  <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<h5 class="mt-4">Uploaded Files</h5>
@if(isset($error))
  <div class="alert alert-danger">{{ $error }}</div>
@elseif(count($files) > 0)
  <ul>
  @foreach($files as $f)
    <li>{{ basename($f) }}</li>
  @endforeach
  </ul>
@else
  <p class="text-muted">Belum ada file yang diupload.</p>
@endif
@endsection
