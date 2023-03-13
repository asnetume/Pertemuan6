<?php

use App\Http\Controllers\SupplierController;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("v9/supplier/",[SupplierController::class, 'index']);

Route::get("v9/supplier/{id}",[SupplierController::class, 'findByID']);

Route::post("v9/supplier",[SupplierController::class, 'save']);

Route::put("v9/supplier/{id}",[SupplierController::class, 'updateSupplier']);

Route::delete("v9/supplier/{id}",[SupplierController::class,'deleteSupplier']);
