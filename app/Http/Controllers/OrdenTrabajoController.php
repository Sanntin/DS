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

    public function aceptar(Request $request)
    {
            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            $ordenTrabajo = OrdenTrabajo::find($request->idOrdenTrabajo)->update(['estado' => 'en proceso']);

       
    }
}
