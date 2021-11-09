<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;

class OrdenTrabajoController extends Controller
{
    public function obtenerOrdenTrabajos($id)
    {
        return view('ordenesDeTrabajo', ['ordenTrabajos' => OrdenTrabajo::where('id_reparacion',$id)->get()]);
    }
}
