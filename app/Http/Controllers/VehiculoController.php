<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function obtenerVehiculo()
    {
        return view('vehiculos', ['vehiculos' => Vehiculo::paginate(7)]);
    }
}
