<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;

class OrdenTrabajoController extends Controller
{
    public function obtenerOrdenTrabajos()
    {
        return view('ordenesDeTrabajo', ['ordenTrabajos' => OrdenTrabajo::where('id_reparacion',1)->get()]);
    }
}
