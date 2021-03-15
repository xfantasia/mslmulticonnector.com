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
    return view('pages/welcome');
});


Route::get('/dashboard', function () {
    return view('pages/dashboard');
});


Route::get('/login', function () {
    return view('pages/login');
});


Route::get('/register', function () {
    return view('pages/register');
});
Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');