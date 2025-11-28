@extends('layout')
@section('content')
<div class="mb-8">
  <h4 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
    <i class="bi bi-cloud-upload-fill text-indigo-600"></i>
    Upload File
  </h4>
  
  <form action="/files" method="POST" enctype="multipart/form-data" id="uploadForm">
    @csrf
    <div class="border-4 border-dashed border-slate-300 rounded-2xl p-12 text-center bg-gradient-to-br from-slate-50 to-slate-100 transition-all duration-300 cursor-pointer hover:border-indigo-500 hover:bg-gradient-to-br hover:from-indigo-50 hover:to-purple-50 hover:-translate-y-1 hover:shadow-xl" id="uploadArea">
      <i class="bi bi-cloud-upload text-6xl text-indigo-600 mb-4 block"></i>
      <h5 class="text-xl font-semibold text-slate-700 mb-2">Drag & Drop Files Here</h5>
      <p class="text-slate-500 mb-4">or click to browse</p>
      <div class="relative inline-block">
        <input type="file" name="file" id="fileInput" class="absolute opacity-0 w-full h-full cursor-pointer @error('file') border-red-500 @enderror" required accept="image/*,application/pdf,.doc,.docx,.txt,.zip,.rar">
        <button type="button" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2" onclick="document.getElementById('fileInput').click()">
          <i class="bi bi-folder2-open"></i>
          Choose File
        </button>
      </div>
      <div id="fileName" class="mt-4 text-sm text-slate-500"></div>
    </div>

    @if($errors->any())
      <div class="bg-gradient-to-r from-red-100 to-pink-100 text-red-800 rounded-xl p-4 mt-4 shadow-lg border-l-4 border-red-500">
        <div class="flex items-start gap-2">
          <i class="bi bi-exclamation-triangle-fill text-red-600 mt-0.5"></i>
          <div>
            <strong class="block mb-2">Error:</strong>
            <ul class="list-disc list-inside space-y-1">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif

    <div class="text-center mt-6">
      <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2 mx-auto">
        <i class="bi bi-upload"></i>
        Upload File
      </button>
    </div>
  </form>
</div>

<div class="mt-8">
  <h5 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
    <i class="bi bi-files text-indigo-600"></i>
    Uploaded Files
  </h5>

  @if(isset($error))
    <div class="bg-gradient-to-r from-red-100 to-pink-100 text-red-800 rounded-xl p-4 shadow-lg border-l-4 border-red-500">
      <div class="flex items-center gap-2">
        <i class="bi bi-exclamation-circle-fill text-red-600"></i>
        <span>{{ $error }}</span>
      </div>
    </div>
    @if(session('status'))
  <div class="bg-gradient-to-r from-green-100 to-emerald-100 text-emerald-800 rounded-xl p-4 mb-4 shadow-lg border-l-4 border-green-500">
    <div class="flex items-center gap-2">
      <i class="bi bi-check-circle-fill text-green-600"></i>
      <span>{{ session('status') }}</span>
    </div>
  </div>
@endif

    @elseif(count($files) > 0)
  <div class="space-y-3">
    @foreach($files as $file)
      <div class="bg-gradient-to-r from-white to-slate-50 border border-slate-200 rounded-xl p-5 flex items-center gap-4 transition-all duration-300 hover:translate-x-1 hover:shadow-lg hover:border-indigo-500">
        <i class="bi bi-file-earmark text-3xl text-indigo-600 flex-shrink-0"></i>
        <span class="flex-1 font-medium text-slate-800 break-all">
          {{ $file['name'] }}
        </span>

        {{-- tombol download / view pakai temporary URL S3 --}}
        <a href="{{ $file['url'] }}" target="_blank"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">
          <i class="bi bi-download"></i> Open
        </a>
      </div>
    @endforeach
  </div>
@else
    <div class="text-center py-16 text-slate-500">
      <i class="bi bi-folder-x text-7xl text-slate-300 mb-4 block"></i>
      <p class="text-lg">Belum ada file yang diupload.</p>
    </div>
  @endif
</div>

<script>
  const uploadArea = document.getElementById('uploadArea');
  const fileInput = document.getElementById('fileInput');
  const fileName = document.getElementById('fileName');

  uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('scale-105', 'border-indigo-500', 'bg-gradient-to-br', 'from-indigo-100', 'to-purple-100');
  });

  uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('scale-105', 'border-indigo-500', 'bg-gradient-to-br', 'from-indigo-100', 'to-purple-100');
  });

  uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('scale-105', 'border-indigo-500', 'bg-gradient-to-br', 'from-indigo-100', 'to-purple-100');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
      fileInput.files = files;
      updateFileName(files[0].name);
    }
  });

  uploadArea.addEventListener('click', () => {
    fileInput.click();
  });

  fileInput.addEventListener('change', (e) => {
    if (e.target.files.length > 0) {
      updateFileName(e.target.files[0].name);
    }
  });

  function updateFileName(name) {
    fileName.textContent = `Selected: ${name}`;
    fileName.className = 'mt-4 text-sm font-semibold text-indigo-600';
  }
</script>
@endsection
