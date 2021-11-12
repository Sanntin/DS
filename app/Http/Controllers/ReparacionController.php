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

    public function comprobante($id)
    {
        $reparacion=Reparacion::where('id',$id)->get();
        $ordenesTrabajo=$reparacion[0]->ordenesTrabajo;
        $tareas=[];
        $i=0;
        $totalprecio=0;
        $totalHoras=0;
        foreach ($ordenesTrabajo as $key => $ordenTrabajo) {
            foreach ($ordenTrabajo->tareas as $key2 => $tarea) {
                $tareas[$i]=$tarea;
                $totalprecio=$tarea->precio+$totalprecio;
                $totalHoras=$tarea->accion->horas+$totalHoras;
                $i=$i+1;
            }
            
        }
        return view('comprobante', ['reparacion' => $reparacion,'tareas'=> $tareas,'totalHoras'=>$totalHoras,'totalprecio'=>$totalprecio]);
    }
}
