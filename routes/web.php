<?php

use App\Http\Controllers\ProfileController;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    if (request('keyword')) {
        $jabatan = Jabatan::cari(request('keyword'))->paginate(5);
    } else {
        $jabatan = Jabatan::paginate(5);
    }
    return view('jabatan', compact('jabatan'));
});
Route::view('/jabatan/tambah','tambah_jabatan');
Route::post('/jabatan', function(Request $request){
    $validasi = $request->validate([
        'nama_jabatan' => 'required',
        'gaji_jabatan' => 'required',
    ],[
        'nama_jabatan.required' => 'nama jabatan dk pacak kosong',
        'gaji_jabatan.required' => 'gaji jabatan dk pacak kosong',
    ]);
    Jabatan::create($validasi);
    return redirect('/jabatan')->with('pesan','Berhasil tambah jabatan');
});

Route::get('/jabatan/{jabatan}/edit', function(Jabatan $jabatan){
    return view('edit_jabatan',compact('jabatan'));
});

Route::put('/jabatan/{id}', function (int $id, Request $req) {
    $validasi = $req->validate([
        'nama_jabatan' => 'required',
        'gaji_jabatan' => 'required',
    ],[
        'nama_jabatan.required' => 'nama jabatan dk pacak kosong',
        'gaji_jabatan.required' => 'gaji jabatan dk pacak kosong',
    ]);
    Jabatan::where('id', $id)->update($validasi);
    return redirect('/jabatan')->with('pesan', 'berhasil update jabatan');
});

Route::delete('/jabatan/{id}', function(int $id){
    Jabatan::destroy($id);
    return redirect('/jabatan')->with('pesan', 'berhasil hapus jabatan');
});

Route::view('upload', 'upload');
Route::post('upload', function(Request $req){
    $lokasi = $req->file('avatar')->store('Avatars');
    User::where('id', Auth::user()->id)->update(['avatar' => $lokasi]);
    return redirect('dashboard');
});