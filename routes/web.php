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

Route::get('/files', function() {
    $files = Storage::files('public/uploads');
    return view('files', compact('files'));
});

Route::post('/files', function(Request $request) {
    $request->validate(['file' => 'required|file']);
    $path = $request->file('file')->store('public/uploads');
    return back()->with('success', 'File uploaded: '.basename($path));
});