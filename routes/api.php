<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReservasisController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/reservasi', [ReservasisController::class, 'index']);
Route::get('/reservasi/{id}', [ReservasisController::class, 'show']);
Route::post('/reservasi-create', [ReservasisController::class, 'store']);
Route::put('/reservasi/{id}', [ReservasisController::class, 'update']);


Route::get('/meja', [MejasController::class, 'index']);
Route::get('/meja/{id}', [MejasController::class, 'show']);
Route::post('/meja-create', [MejasController::class, 'store']);
Route::put('/meja/{id}', [MejasController::class, 'update']);
Route::delete('/meja/{id}', [MejasController::class, 'destroy']);


Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::get('/menu-create', [MenuController::class, 'store']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);


