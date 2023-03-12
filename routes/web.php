<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// halaman dashboard
Route::get('/dashboard', function(){
    return view('index');
});

// halaman paket
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/tambah', [PaketController::class, 'tambah']);
Route::post('/paket/tambah', [PaketController::class, 'store']);
Route::get('/paket/edit/{paket:id}', [PaketController::class, 'edit']);
Route::put('/paket/edit/{paket:id}', [PaketController::class, 'update']);
Route::delete('/paket/delete/{paket:id}', [PaketController::class, 'delete']);

// halaman pengguna
Route::get('/pengguna', [UserController::class, 'index']);
Route::get('/pengguna/tambah', [UserController::class, 'tambah']);
Route::post('/pengguna/tambah', [UserController::class, 'store']);
Route::get('/pengguna/edit/{user:id}', [UserController::class, 'edit']);
Route::put('/pengguna/edit/{user:id}', [UserController::class, 'update']);
Route::delete('/pengguna/delete/{user:id}', [UserController::class, 'delete']);


// halaman transaksi
Route::get('/pesanan', [TransaksiController::class, 'index']);
Route::get('/pesanan/tambah', [TransaksiController::class, 'tambah']);
Route::post('/pesanan/tambah', [TransaksiController::class, 'store']);
Route::get('/transaksi/{pesanan:id}', [TransaksiController::class, 'edit']);
Route::put('/pesanan/edit/{pesanan:id}', [TransaksiController::class, 'update']);
Route::delete('/pesanan/delete/{pesanan:id}', [TransaksiController::class, 'delete']);
