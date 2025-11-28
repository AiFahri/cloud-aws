<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/healthz', fn() => response('ok', 200));
Route::resource('records', RecordController::class);

Route::get('/files', function () {
    try {
        // ambil semua file di folder 'uploads' di bucket S3
        $files = Storage::disk('s3')->files('uploads');

        // optional: bikin URL sementara untuk di-download / preview
        $fileData = collect($files)->map(function ($path) {
            return [
                'path' => $path,
                'name' => basename($path),
                'url'  => Storage::disk('s3')->temporaryUrl($path, now()->addMinutes(10)),
            ];
        });

        return view('files', [
            'files' => $fileData,
        ]);
    } catch (\Exception $e) {
        return view('files', [
            'files' => [],
            'error' => 'Error loading files: ' . $e->getMessage(),
        ]);
    }
});

Route::post('/files', function(Request $request) {
    try {
        if (!$request->hasFile('file')) {
            return back()->withErrors(['file' => 'File tidak ditemukan.'])->withInput();
        }

        $file = $request->file('file');
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx', 'txt', 'zip', 'rar'];
        $extension = strtolower($file->getClientOriginalExtension());
        
        if (!in_array($extension, $allowedExtensions)) {
            return back()->withErrors(['file' => 'Format file tidak didukung. Format yang diizinkan: ' . implode(', ', $allowedExtensions)])->withInput();
        }
        
        $request->validate([
            'file' => [
                'required',
                'file',
                'max:10240', // max 10MB dalam KB
            ]
        ], [
            'file.required' => 'Silakan pilih file terlebih dahulu.',
            'file.file' => 'File yang diupload tidak valid.',
            'file.max' => 'Ukuran file maksimal 10MB.'
        ]);

        $maxSize = 10240 * 1024; 
        if ($file->getSize() > $maxSize) {
            return back()->withErrors(['file' => 'Ukuran file terlalu besar. Maksimal 10MB.'])->withInput();
        }

        $path = $file->store('uploads', 's3');
        
        \Log::info('File uploaded successfully', ['path' => $path]);
        
        return back()->with('success', 'File berhasil diupload: ' . basename($path));
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation error', ['errors' => $e->errors()]);
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Upload error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return back()->withErrors(['error' => 'Gagal mengupload file: ' . $e->getMessage()])->withInput();
    }
});