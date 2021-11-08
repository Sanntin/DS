<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;

class ReparacionController extends Controller
{
    public function obtenerReparaciones()
    {
        return view('reparaciones', ['reparaciones' => Reparacion::latest('fechaDeEntrada')->paginate(7)]);
    }
}
