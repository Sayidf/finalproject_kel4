<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/events', function () {
    return view('landingpage.events');
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

Route::get('/reservation', function () {
    return view('landingpage.reservation');
});

Route::get('/administrator', function () {
    return view('admin.home');
});