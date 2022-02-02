<?php

use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
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




Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('moje-knjige',[KnjigaController::class,'mojeKnjige']);

     //Route::post('dodaj-Knjigu',[KnjigaController::class,'store']);

    // Route::post('azuriraj-Knjigu/{id}',[BookController::class,'update']);

    // Route::delete('/obrisi-Knjigu/{id}',[BookController::class,'destroy']);

    Route::get('/logout',[AuthController::class,'logout']);

    

    Route::resource('knjige',KnjigaController::class)->only('store','update','destroy');

});



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/kategorija',[KategorijaController::class, 'store']);



