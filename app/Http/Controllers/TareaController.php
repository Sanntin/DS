<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Pieza;
use App\Models\Accion;
use App\Models\Tarea_Pieza;

class TareaController extends Controller
{
    public function completar(Request $request)
    {
            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            $tarea = Tarea::find($request->idTarea)->update(['estado' => 'completada']);
            // return  response()->json("hola");
    }

    public function mostrarForm($id)
    {
    
        session()->flash('id_ordenTrabajo',$id);
        return view('agregarTarea', ['acciones' => Accion::all(),'piezas'=>Pieza::all()]);
    }

    public function agregarTarea(Request $request)
    {   

        session()->flash('id_ordenTrabajo',$request->id_ordenTrabajo);
        $data=$request->all();
        $tarea= new Tarea;
        $tarea->estado="no realizado";
        $tarea->id_ordenTrabajo=$data['ordenTrabajo'];
        $tarea->id_accion=$data['acciones'];
        $tarea->precio=$tarea->accion->precio;
        $tarea->save();



        $i=1;
        $precioPiezas=0;
        foreach ($data as $key => $value) {
            if($key == 'precio_N'.strval($i)){

            $idPieza="pieza_N".strval($i);
            $cantidad="cantidad_N".strval($i);
            $precio="precio_N".strval($i);
            $piezaUtilizar= new Tarea_pieza;
            $piezaUtilizar->id_tarea=$tarea->id;
            $piezaUtilizar->id_pieza=$request->$idPieza;
            $piezaUtilizar->cantidad=$request->$cantidad;
            $piezaUtilizar->precio=$request-> $precio * $request->$cantidad;

            $precioPiezas=$precioPiezas+$request->$precio;

            $piezaUtilizar->save();
            $i=$i+1;
            }    
        }

        $tarea->precio=$tarea->precio+$precioPiezas;
        $tarea->save();

        
        return redirect('/reparaciones/agregarOrdenTrabajo/Orden/'.$data['ordenTrabajo']);

    }

    public function eliminarTarea(Request $request)
    {
        Tarea::destroy($request->idtarea);
    }
}
