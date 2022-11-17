<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\SessionController;

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

Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/menu', function () {
    return view('landingpage.menu');
});

Route::get('/specials', function () {
    return view('landingpage.specials');
});

Route::get('/chefs', function () {
    return view('landingpage.chefs');
});

Route::get('/gallery', function () {
    return view('landingpage.gallery');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});



Route::get('/login', function () {
    return view('landingpage.mylogin');
});

Route::get('/reg', function () {
    return view('sesi/register');
});

Route::get('/administrator', function () {
    return view('back.home');
});

Route::get('/administrator/customer', function () {
    return view('customer.index');
});

Route::resource('administrator/meja', MejaController::class);
Route::resource('administrator/menu', MenuController::class);
// Route::get('menu-detail/{id}', [MenuController::class, 'show'])->name('show');
Route::resource('administrator/kategori', KategoriController::class);
// Route::get('administrator/menu-edit/{id}', [MenuController::class, 'edit']);
// Route::get('administrator/meja-edit/{id}', [MejaController::class, 'edit']);
// Route::get('administrator/kategori-edit/{id}', [KategoriController::class, 'edit']);

Route::get('sesi', [SessionController::class, 'index']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::get('sesi/logout', [SessionController::class, 'logout']);
Route::post('sesi/create', [SessionController::class, 'create']);


//reservasi
Route::resource('administrator/reservasi', ReservasiController::class);
