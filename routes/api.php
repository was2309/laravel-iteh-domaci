<?php

use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\UserController;
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

Route::post('/register',[UserController::class, 'store']);

Route::post('/kategorija',[KategorijaController::class, 'store']);

Route::resource('users',UserController::class);

Route::resource('knjige',KnjigaController::class);

Route::get('knjige/pisac/{id}',[KnjigaController::class, 'getByPisac']);

Route::get('knjige/kategorija/{id}', [KnjigaController::class, 'getByKategorija']);


