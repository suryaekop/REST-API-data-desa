<?php

use App\Http\Controllers\DesaController;
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
Route::get('/desa',[DesaController::class,'index']);
Route::get('/desa/{id}',[DesaController::class,'tampil']);
Route::post('/desa',[DesaController::class,'tambah']);
Route::put('/desa/{id}',[DesaController::class,'edit']);
Route::delete('/desa/{id}',[DesaController::class,'hapus']);

