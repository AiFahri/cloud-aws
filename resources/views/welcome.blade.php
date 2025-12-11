@extends('layout')

@section('content')
<div class="text-center mb-12">
  <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 mb-6 shadow-2xl">
    <i class="bi bi-cloud-upload text-4xl text-white"></i>
  </div>
  <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">
    AWS Cloud Manager
  </h1>
  <p class="text-lg md:text-xl text-slate-600 max-w-2xl mx-auto">
    Platform manajemen data dan file berbasis AWS Cloud dengan fitur CRUD lengkap dan integrasi S3 storage
  </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-8">
  <a href="/files" class="group bg-gradient-to-br from-white to-slate-50 rounded-2xl p-8 shadow-xl border-2 border-slate-200 hover:border-indigo-500 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
    <div class="flex items-start justify-between mb-6">
      <div class="w-16 h-16 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-3xl shadow-lg group-hover:scale-110 transition-transform duration-300">
        <i class="bi bi-cloud-upload-fill"></i>
      </div>
      <i class="bi bi-arrow-right-circle text-2xl text-slate-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all duration-300"></i>
    </div>
    <h3 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
      File Management
    </h3>
    <p class="text-slate-600 mb-4 leading-relaxed">
      Upload dan kelola file Anda dengan mudah. Semua file disimpan secara aman di AWS S3 Cloud Storage dengan akses cepat dan andal.
    </p>
    <div class="flex flex-wrap gap-2 mb-4">
      <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm font-medium">Upload File</span>
      <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg text-sm font-medium">S3 Storage</span>
      <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium">Secure Access</span>
    </div>
    <div class="flex items-center text-indigo-600 font-semibold group-hover:gap-3 transition-all duration-300">
      <span>Akses File Manager</span>
      <i class="bi bi-arrow-right ml-2 group-hover:ml-3 transition-all duration-300"></i>
    </div>
  </a>

  <a href="/records" class="group bg-gradient-to-br from-white to-slate-50 rounded-2xl p-8 shadow-xl border-2 border-slate-200 hover:border-indigo-500 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
    <div class="flex items-start justify-between mb-6">
      <div class="w-16 h-16 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-3xl shadow-lg group-hover:scale-110 transition-transform duration-300">
        <i class="bi bi-database-fill"></i>
      </div>
      <i class="bi bi-arrow-right-circle text-2xl text-slate-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all duration-300"></i>
    </div>
    <h3 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
      Records Management
    </h3>
    <p class="text-slate-600 mb-4 leading-relaxed">
      Kelola data records Anda dengan sistem CRUD lengkap. Buat, edit, dan hapus records dengan antarmuka yang intuitif dan responsif.
    </p>
    <div class="flex flex-wrap gap-2 mb-4">
      <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm font-medium">CRUD Operations</span>
      <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg text-sm font-medium">Data Management</span>
      <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium">Easy Interface</span>
                </div>
    <div class="flex items-center text-indigo-600 font-semibold group-hover:gap-3 transition-all duration-300">
      <span>Akses Records Manager</span>
      <i class="bi bi-arrow-right ml-2 group-hover:ml-3 transition-all duration-300"></i>
                </div>
  </a>
        </div>

<div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 md:p-12 border border-indigo-100">
  <h2 class="text-3xl font-bold text-slate-800 mb-8 text-center flex items-center justify-center gap-3">
    <i class="bi bi-star-fill text-yellow-500"></i>
    Fitur Utama
  </h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="text-center">
      <div class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-xl mx-auto mb-4 shadow-lg">
        <i class="bi bi-cloud-check"></i>
      </div>
      <h4 class="font-bold text-slate-800 mb-2">AWS S3 Integration</h4>
      <p class="text-slate-600 text-sm">Integrasi langsung dengan Amazon S3 untuk penyimpanan file yang aman dan scalable</p>
    </div>
    <div class="text-center">
      <div class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-xl mx-auto mb-4 shadow-lg">
        <i class="bi bi-shield-check"></i>
      </div>
      <h4 class="font-bold text-slate-800 mb-2">Secure & Reliable</h4>
      <p class="text-slate-600 text-sm">Keamanan data terjamin dengan enkripsi dan akses kontrol yang ketat</p>
    </div>
    <div class="text-center">
      <div class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 flex items-center justify-center text-white text-xl mx-auto mb-4 shadow-lg">
        <i class="bi bi-device-ssd"></i>
      </div>
      <h4 class="font-bold text-slate-800 mb-2">Fast Performance</h4>
      <p class="text-slate-600 text-sm">Akses cepat dan performa optimal untuk semua operasi data dan file</p>
    </div>
  </div>
</div>
@endsection
