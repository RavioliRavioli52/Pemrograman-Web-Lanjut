<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::middleware(['checkingrole:1'])->group(function() {
        Route::get('/admin/mahasiswa', [\App\Http\Controllers\AdminController::class, 'index'])->name('mahasiswalist');
        Route::get('/admin/mahasiswa/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('insertmahasiswa');
        Route::post('/admin/mahasiswa/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('storemahasiswa');
        Route::get('/admin/mahasiswa/delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('deletemahasiswa');
        Route::get('/admin/mahasiswa/delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('deletemahasiswa');
        Route::get('/admin/mata_kuliah', [\App\Http\Controllers\MatkulController::class, 'index'])->name('listmatkul');
        Route::get('/admin/mata_kuliah/create', [\App\Http\Controllers\MatkulController::class, 'create'])->name('insertmatkul');
        Route::post('/admin/mata_kuliah/create', [\App\Http\Controllers\MatkulController::class, 'store'])->name('storematkul');
        Route::get('/admin/mata_kuliah/delete/{id}', [\App\Http\Controllers\MatkulController::class, 'destroy'])->name('deletematkul');
//        Route::get('/admin/program_studi', [\App\Http\Controllers\ProdiController::class, 'index'])->name('list_prodi');
//        Route::get('/admin/program_studi/create', [\App\Http\Controllers\ProdiController::class, 'create'])->name('insertprodi');
//        Route::post('/admin/program_studi/create', [\App\Http\Controllers\ProdiController::class, 'store'])->name('storetprodi');
    });
    Route::middleware(['checkingrole:2'])->group(function() {
        Route::get('/mahasiswa/profile', [\App\Http\Controllers\MahasiswaController::class, 'index'])->name('profile');
        Route::get('/mahasiswa/perwalian', [\App\Http\Controllers\perwalianController::class, 'index'])->name('perwalian');
        Route::get('/mahasiswa/edit_profile/{mahasiswa}', [\App\Http\Controllers\MahasiswaController::class, 'edit'])->name('editprofile');
        Route::post('/mahasiswa/edit_profile/{mahasiswa}', [\App\Http\Controllers\AdminController::class, 'update'])->name('updateprofile');
        Route::get('/mahasiswa/dkbs', [\App\Http\Controllers\dkbsController::class, 'index'])->name('dkbs');
    });
});






