<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

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
    return view('cart.menu');
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

Route::get('/register', function () {
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
Route::resource('administrator/customer', UsersController::class);
Route::get('/administrator', [DashboardController::class, 'index']);
// Route::get('administrator/menu-edit/{id}', [MenuController::class, 'edit']);
// Route::get('administrator/meja-edit/{id}', [MejaController::class, 'edit']);
// Route::get('administrator/kategori-edit/{id}', [KategoriController::class, 'edit']);


//sesi
Route::get('login', [SessionController::class, 'index']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::get('sesi/logout', [SessionController::class, 'logout']);
Route::post('sesi/create', [SessionController::class, 'create']);

//reservasi
Route::resource('administrator/reservasi', ReservasiController::class);

//print
Route::get('/administrator/menu-pdf', [MenuController::class, 'menuPDF']);
Route::get('/administrator/menu-excel', [MenuController::class, 'menuExcel']);
Route::get('/administrator/meja-pdf', [MejaController::class, 'mejaPDF']);
Route::get('/administrator/meja-excel', [MejaController::class, 'mejaExcel']);
Route::get('/administrator/kategori-pdf', [KategoriController::class, 'kategoriPDF']);
Route::get('/administrator/kategori-excel', [KategoriController::class, 'kategoriExcel']);
Route::get('/administrator/customer-pdf', [UsersController::class, 'customerPDF']);
Route::get('/administrator/customer-excel', [UsersController::class, 'customerExcel']);
Route::get('/administrator/reservasi-pdf', [ReservasiController::class, 'reservasiPDF']);
Route::get('/administrator/reservasi-excel', [ReservasiController::class, 'reservasiExcel']);

//Cart
Route::get('/', [CartController::class, 'index']);
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
