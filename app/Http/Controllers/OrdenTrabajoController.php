<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;
use App\Models\Tarea;
use App\Models\Reparacion;

class OrdenTrabajoController extends Controller
{
    public function obtenerOrdenTrabajos($id)
    {
        return view('ordenesDeTrabajo', ['ordenTrabajos' => OrdenTrabajo::where('id_reparacion',$id)->get()]);
    }

    public function aceptar(Request $request)
    {

        //Habria que hacer los commits y rollback


            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            OrdenTrabajo::find($request->idOrdenTrabajo)->update(['estado' => 'en proceso']);
            
            $ordenTrabajo = OrdenTrabajo::where('id',$request->idOrdenTrabajo)->get();

         
            // Hay que mejorarlo... esto busca las otras ordenes de trabajo de la reparacion
            $reparacion = $ordenTrabajo[0]->reparacion;
            if($reparacion->estado=="diagnostico"){
            Reparacion::find($reparacion->id)->update(['estado' => "en proceso"]);            
            }
           
    }

    public function completarTarea(Request $request)
    {
            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            Tarea::find($request->idTarea)->update(['estado' => 'completada']);


            // Acualizo el porcentaje de avance
            $tarea = Tarea::where('id',$request->idTarea)->get();
            
            $ordenTrabajo= OrdenTrabajo::where('id',$tarea[0]->ordenTrabajo->id)->get();

            $cantidadTotalTareas=sizeof($ordenTrabajo[0]->tareas);
            $porcentaje=$ordenTrabajo[0]->porcentajeAvance;

            $cantidaCompletaTareas=ceil($porcentaje*$cantidadTotalTareas/100)+1;
            OrdenTrabajo::find($ordenTrabajo[0]->id)->update(['porcentajeAvance' => $cantidaCompletaTareas/$cantidadTotalTareas*100]);
    }
}
