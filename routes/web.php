<?php

use App\Http\Controllers\UsulanController;
use Illuminate\Support\Facades\Route;
use App\Events\UsulanPemindahtangananUpdated;
use App\Models\UsulanPemindahtanganan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengumuman', function () {
    return view('pengumuman');
});

Route::get('/ulang-tahun', function () {
    return view('ulangtahun');
});

Route::get('/struktur', function () {
    return view('struktur');
});

Route::get('/usulan', [UsulanController::class, 'index']);
Route::get('/api/usulan', [UsulanController::class, 'api']);
