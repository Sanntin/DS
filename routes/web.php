<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\TareaController;
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
     return redirect('/reparaciones');
});

// Autenticacion de usuario
Route::get('/login', function () {return view('login');
})->name('login');
Route::post('/login',[SessionController::class,'login'])->middleware('guest');

Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
// Route::get('/usuario');
Route::get('/usuario', function () {
    return view('usuario');
})->middleware('auth');


//Reparaciones

Route::get('/reparaciones', [ReparacionController::class,'obtenerReparaciones'])->middleware('auth');

Route::get('/generarReparacion', [ReparacionController::class,'formGenerarReparacion'])->middleware('auth');
Route::POST('/generarReparacion/crear', [ReparacionController::class,'crearReparacion'])->middleware('auth');
Route::get('/obtenerVehiculoCliente', [VehiculoController::class,'obtenerVehiculoCliente'])->middleware('auth');
Route::POST('/reparaciones/cancelar', [ReparacionController::class,'cancelar'])->middleware('auth');

Route::get('/reparaciones/comprobante/{id}', [ReparacionController::class,'comprobante'])->middleware('auth');

Route::get('/reporteDeReparaciones', function () {
    return view('reporteDeReparaciones');
});
//Ordenes de Trabajo

Route::get('/reparaciones/ordenesDeTrabajo/{id}', [OrdenTrabajoController::class,'obtenerOrdenTrabajos'])->middleware('auth');

Route::get('/reparaciones/agregarOrdenTrabajo/{id}', [OrdenTrabajoController::class,'formAgregar'])->middleware('auth');

Route::get('/reparaciones/agregarOrdenTrabajo/Orden/{id}', [OrdenTrabajoController::class,'volverAgregar'])->middleware('auth');

Route::get('/reparaciones/cancelarOrdenTrabajo', [OrdenTrabajoController::class,'cancelar'])->middleware('auth');

Route::post('/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo', [OrdenTrabajoController::class,'aceptar'])->middleware('auth');

Route::post('/reparaciones/ordenesDeTrabajo/completarTarea', [OrdenTrabajoController::class,'completarTarea'])->middleware('auth');


//Tareas
Route::get('/agregarTarea/{id}', [TareaController::class,'mostrarForm'])->middleware('auth');
Route::post('/agregarTarea/form', [TareaController::class,'agregarTarea'])->middleware('auth');
Route::post('/eliminarTarea', [TareaController::class,'eliminarTarea'])->middleware('auth');

//Pieza

Route::get('/stock', [PiezaController::class,'obtenerPiezas'])->middleware('auth');
Route::get('/obtenerPrecioPieza', [PiezaController::class,'precioPieza'])->middleware('auth');

//Vehiculi
Route::get('/vehiculos', [VehiculoController::class,'obtenerVehiculo'])->middleware('auth');
Route::get('/vehiculos/agregar', [VehiculoController::class,'datosAgregarVehiculo'])->middleware('auth');




//Clientes
Route::get('/agregarCliente', function () {
    return view('agregarCliente');
});

Route::get('/clientes', [ClienteController::class,'obtenerClientes'])->middleware('auth');