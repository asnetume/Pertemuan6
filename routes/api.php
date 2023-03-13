<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PencakerController;
use App\Http\Controllers\PencakerDaftarLowonganController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PerusahaanDaftarEventController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/lowongan',  LowonganController::class);

Route::resource('/perusahaan',  PerusahaanController::class);

Route::resource('/pendidikan',  PendidikanController::class);

Route::resource('/pencaker',  PencakerController::class);

Route::resource('/pengalaman',  PengalamanController::class);

Route::resource('/artikel',  ArtikelController::class);

Route::resource('/event',  EventController::class);

Route::resource('/bidang',  BidangController::class);

Route::resource('/provinsi',  ProvinsiController::class);

Route::resource('/user',  UserController::class);

Route::resource('/daftar-event',  PerusahaanDaftarEventController::class);
Route::resource('/daftar-lowongan',  PencakerDaftarLowonganController::class);
