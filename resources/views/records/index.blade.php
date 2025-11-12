@extends('layout')

@section('content')
<a href="{{ route('records.create') }}" class="btn btn-primary mb-3">+ Add Record</a>

<table class="table table-bordered">
  <tr>
    <th>ID</th><th>Title</th><th>Content</th><th>Action</th>
  </tr>
  @foreach($records as $r)
  <tr>
    <td>{{ $r->id }}</td>
    <td>{{ $r->title }}</td>
    <td>{{ $r->content }}</td>
    <td>
      <a href="{{ route('records.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('records.destroy',$r) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Del</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection
