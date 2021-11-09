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
        return redirect('reparaciones');
        if ($request->has('_token')) {
            $ordenTrabajo = OrdenTrabajo::where('id_reparacion',$id)->get();
            
             return  response()->json($ordenTrabajo);
        }
    
        // Que hacer si no tiene token
        return redirect('reparaciones');
       
    }
}
