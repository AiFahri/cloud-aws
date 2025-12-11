@extends('layout')

@section('content')
<div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
  <h4 class="text-2xl font-bold text-slate-800 mb-0 flex items-center gap-3">
    <i class="bi bi-database-fill text-indigo-600"></i>
    Records Management
  </h4>
  <a href="{{ route('records.create') }}" class="bg-gradient-to-r text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 inline-flex items-center gap-2">
    <i class="bi bi-plus-circle-fill"></i>
    Add New Record
  </a>
</div>

@if(count($records) > 0)
  <div class="overflow-x-auto">
    <table class="w-full bg-white rounded-xl overflow-hidden shadow-lg">
      <thead class="bg-gradient-to-r text-white">
        <tr>
          <th class="px-5 py-4 text-left font-semibold text-xs uppercase tracking-wider">
            <div class="flex items-center gap-2">
              <i class="bi bi-hash"></i>
              ID
            </div>
          </th>
          <th class="px-5 py-4 text-left font-semibold text-xs uppercase tracking-wider">
            <div class="flex items-center gap-2">
              <i class="bi bi-type"></i>
              Title
            </div>
          </th>
          <th class="px-5 py-4 text-left font-semibold text-xs uppercase tracking-wider">
            <div class="flex items-center gap-2">
              <i class="bi bi-file-text"></i>
              Content
            </div>
          </th>
          <th class="px-5 py-4 text-left font-semibold text-xs uppercase tracking-wider">
            <div class="flex items-center gap-2">
              <i class="bi bi-gear"></i>
              Actions
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($records as $r)
        <tr class="border-b border-slate-200 transition-all duration-200 hover:bg-white hover:scale-[1.01] hover:shadow-md last:border-b-0">
          <td class="px-5 py-4 font-semibold text-indigo-600 font-mono">#{{ $r->id }}</td>
          <td class="px-5 py-4 font-semibold text-slate-800">{{ $r->title }}</td>
          <td class="px-5 py-4 text-slate-600 max-w-md truncate">{{ $r->content }}</td>
          <td class="px-5 py-4">
            <div class="flex flex-col sm:flex-row gap-2">
              <a href="{{ route('records.edit',$r) }}" class="bg-gradient-to-r text-white px-4 py-2 rounded-lg font-medium text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 inline-flex items-center gap-2 justify-center">
                <i class="bi bi-pencil-fill"></i>
                Edit
              </a>
              <form action="{{ route('records.destroy',$r) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf @method('DELETE')
                <button type="submit" class="bg-gradient-to-r text-white px-4 py-2 rounded-lg font-medium text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 inline-flex items-center gap-2 w-full sm:w-auto justify-center">
                  <i class="bi bi-trash-fill"></i>
                  Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@else
  <div class="text-center py-16 px-8 text-slate-500">
    <i class="bi bi-inbox text-8xl text-slate-300 mb-6 block"></i>
    <h5 class="text-xl font-semibold text-slate-800 mb-2">No Records Found</h5>
    <p class="mb-6">Get started by creating your first record.</p>
    <a href="{{ route('records.create') }}" class="bg-gradient-to-r text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 inline-flex items-center gap-2">
      <i class="bi bi-plus-circle-fill"></i>
      Create First Record
    </a>
  </div>
@endif
@endsection


