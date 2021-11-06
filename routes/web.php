<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
    return view('home');
});

// Autenticacion de usuario
Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[SessionController::class,'login'])->middleware('guest');

Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');


Route::get('/ordenesDeTrabajo', function () {
    return view('ordenesDeTrabajo');
});

Route::get('/reparaciones', function () {
    return view('reparaciones');
});

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/vehiculos', function () {
    return view('vehiculos');
});