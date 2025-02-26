<?php

use App\Http\Controllers\ProfileController;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/jabatan',function(){
    $jabatan = Jabatan::all();
    return view('jabatan', compact('jabatan'));
});
Route::view('/jabatan/tambah','tambah_jabatan');
Route::post('/jabatan', function(Request $request){
    Jabatan::create([
        'nama_jabatan' => $request->nama_jabatan,
        'gaji_jabatan' => $request->gaji_jabatan,
    ]);
    return redirect('/jabatan')->with('pesan','Berhasil tambah jabatan');
});
Route::delete('/jabatan/{id}', function(int $id){
    Jabatan::destroy($id);
    return redirect('/jabatan')->with('pesan', 'berhasil hapus jabatan');
});