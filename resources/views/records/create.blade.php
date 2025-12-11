@extends('layout')
@section('content')
<div class="mb-8 pb-6 border-b-2 border-slate-200">
  <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-2xl mb-4">
    <i class="bi bi-plus-circle-fill"></i>
  </div>
  <h4 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2 flex items-center gap-3">
    <i class="bi bi-file-earmark-plus"></i>
    Create New Record
  </h4>
  <p class="text-slate-500">Fill in the details below to create a new record</p>
</div>

<form action="{{ route('records.store') }}" method="POST">
  @csrf
  
  <div class="mb-7">
    <label class="font-semibold text-slate-800 mb-3 flex items-center gap-2 text-base">
      <i class="bi bi-type text-indigo-600"></i>
      Title
    </label>
    <input 
      type="text" 
      name="title" 
      class="w-full border-2 border-slate-200 rounded-xl px-5 py-3.5 text-base transition-all duration-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 focus:outline-none @error('title') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror" 
      placeholder="Enter record title..."
      value="{{ old('title') }}"
      required
    >
    @error('title')
      <div class="mt-2 text-red-600 text-sm flex items-center gap-1">
        <i class="bi bi-exclamation-circle"></i>
        <span>{{ $message }}</span>
      </div>
    @enderror
  </div>

  <div class="mb-7">
    <label class="font-semibold text-slate-800 mb-3 flex items-center gap-2 text-base">
      <i class="bi bi-file-text text-indigo-600"></i>
      Content
    </label>
    <textarea 
      name="content" 
      class="w-full border-2 border-slate-200 rounded-xl px-5 py-3.5 text-base min-h-[150px] resize-y transition-all duration-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 focus:outline-none @error('content') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror" 
      placeholder="Enter record content..."
      required
    >{{ old('content') }}</textarea>
    @error('content')
      <div class="mt-2 text-red-600 text-sm flex items-center gap-1">
        <i class="bi bi-exclamation-circle"></i>
        <span>{{ $message }}</span>
      </div>
    @enderror
  </div>

  <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t-2 border-slate-200">
    <button type="submit" class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-8 py-3.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 inline-flex items-center gap-2">
      <i class="bi bi-check-circle-fill"></i>
      Save Record
    </button>
    <a href="{{ route('records.index') }}" class="bg-slate-100 border-2 border-slate-200 text-slate-600 px-8 py-3.5 rounded-xl font-semibold hover:bg-slate-200 hover:border-slate-300 hover:-translate-y-0.5 transition-all duration-300 inline-flex items-center gap-2 text-center justify-center">
      <i class="bi bi-x-circle"></i>
      Cancel
    </a>
  </div>
</form>
@endsection


