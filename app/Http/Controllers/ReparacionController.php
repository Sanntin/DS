<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Cliente;

class ReparacionController extends Controller
{
    public function obtenerReparaciones()
    {
        return view('reparaciones', ['reparaciones' => Reparacion::latest('fechaDeEntrada')->paginate(7)]);
    }

    public function formGenerarReparacion()
    {
        return view('generarReparacion', ['clientes' => Cliente::all()]);
    }
}
