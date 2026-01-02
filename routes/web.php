<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ObjekRetribusiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SkrdController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TtdController;
use App\Http\Controllers\UltahController;
use App\Http\Controllers\WajibRestribusiController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UploadBuktiController;

// Route::get('/', [UserAuthController::class, 'showLogin'])->name('/');


Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');


// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Route::post('/logout', function () {
//     Auth::logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();

//     return redirect('/');
// })->name('logout');



// Route::get('/dashboard2', function () {
//     return view('layouts.app');
// })->name('admin.dashboard');

Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/', [AdminAuthController::class, 'showLogin']);
    Route::get('/dashboard', [AdminAuthController::class, 'index'])->name('admin.dashboard');

    // ultah
    Route::get('/ultah', [UltahController::class, 'index'])->name('admin.ultah');
    Route::get('/ultah/create', [UltahController::class, 'create'])->name('admin.ultah.create');
    Route::post('/ultah/loadData', [UltahController::class, 'loadData'])->name('admin.ultah.loadData');
    Route::post('/ultah/store', [UltahController::class, 'store'])->name('admin.ultah.store');
    Route::get('/ultah/create', [UltahController::class, 'create'])->name('admin.ultah.create');
    Route::get('/ultah/edit/{id}', [UltahController::class, 'edit'])->name('admin.ultah.edit');
    Route::post('/ultah/update', [UltahController::class, 'update'])->name('admin.ultah.update');
    Route::post('/ultah/destroy', [UltahController::class, 'destroy'])->name('admin.ultah.destroy');


    // Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/pengumuman/loadData', [PengumumanController::class, 'loadData'])->name('admin.pengumuman.loadData');
    Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::post('/pengumuman/update', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::post('/pengumuman/destroy', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');


    // Struktur
    Route::get('/struktur', [StrukturController::class, 'index'])->name('admin.struktur');
    Route::post('/struktur/loadData', [StrukturController::class, 'loadData'])->name('admin.struktur.loadData');
    Route::get('/struktur/create', [StrukturController::class, 'create'])->name('admin.struktur.create');
    Route::post('/struktur/store', [StrukturController::class, 'store'])->name('admin.struktur.store');
    Route::get('/struktur/edit/{id}', [StrukturController::class, 'edit'])->name('admin.struktur.edit');
    Route::post('/struktur/update', [StrukturController::class, 'update'])->name('admin.struktur.update');
    Route::post('/struktur/destroy', [StrukturController::class, 'destroy'])->name('admin.struktur.destroy');







    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
