<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\MejasController;
use App\Http\Controllers\Api\MenuController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware(["auth:sanctum"])->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/{id}', [KategoriController::class, 'show']);
    Route::post('/kategori-create', [KategoriController::class, 'store']);

    Route::get('/meja', [MejasController::class, 'index']);
    Route::get('/meja/{id}', [MejasController::class, 'show']);
    Route::post('/meja-create', [MejasController::class, 'store']);

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/{id}', [MenuController::class, 'show']);
    Route::get('/menu-create', [MenuController::class, 'store']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
