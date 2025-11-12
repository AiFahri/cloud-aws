@extends('layout')
@section('content')
<form action="{{ route('records.update', $record) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ $record->title }}">
  </div>
  <div class="mb-3">
    <label>Content</label>
    <textarea name="content" class="form-control">{{ $record->content }}</textarea>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
