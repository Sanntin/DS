<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\OrdenTrabajoController;
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
Route::get('/login', function () {return view('login');
})->name('login');
Route::post('/login',[SessionController::class,'login'])->middleware('guest');

Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');


// Route::get('/ordenesDeTrabajo', function () {
//     return view('ordenesDeTrabajo');
// });


Route::get('/reparaciones/ordenesDeTrabajo/{id}', [OrdenTrabajoController::class,'obtenerOrdenTrabajos'])->middleware('auth');

Route::post('/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo', [OrdenTrabajoController::class,'aceptar'])->middleware('auth');

Route::post('/reparaciones/ordenesDeTrabajo/completarTarea', [OrdenTrabajoController::class,'completarTarea'])->middleware('auth');

Route::get('/reparaciones', [ReparacionController::class,'obtenerReparaciones'])->middleware('auth');




Route::get('/stock', [PiezaController::class,'obtenerPiezas'])->middleware('auth');

Route::get('/vehiculos', [VehiculoController::class,'obtenerVehiculo'])->middleware('auth');
Route::get('/vehiculos/agregar', [VehiculoController::class,'datosAgregarVehiculo'])->middleware('auth');


Route::get('/clientes', [ClienteController::class,'obtenerClientes'])->middleware('auth');

// Route::get('/usuario');
Route::get('/usuario', function () {
    return view('usuario');
})->middleware('auth');

Route::get('/reporteDeReparaciones', function () {
    return view('reporteDeReparaciones');
});

Route::get('/comprobante', function () {
    return view('comprobante');
});

Route::get('/agregarTarea', function () {
    return view('agregarTarea');
});