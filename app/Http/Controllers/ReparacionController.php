<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Cliente;
use App\Models\Tarea_Pieza;
use App\Models\Tarea;
use App\Models\Accion;
use App\Models\Pieza;

class ReparacionController extends Controller
{
    public function obtenerReparaciones()
    {
        return view('reparaciones', ['reparaciones' => Reparacion::latest('fechaDeEntrada')->paginate(7)]);
    }

    public function formGenerarReparacion()
    {
        return view('generarReparacion', ['clientes' => Cliente::where('status',1)->get()]);
    }

    public function crearReparacion(Request $request)
    {
        $fechaActual=now()->format('Y-m-d');

        $reparacion= new Reparacion;
        $reparacion->fechaDeEntrada=$fechaActual;
        $reparacion->motivo=$request->motivo;
        $reparacion->kilometraje=$request->kilometraje;
        $reparacion->estado='diagnostico';
        $reparacion->dniCliente=$request->cliente;
        $reparacion->patente=$request->vehiculo;
        
        $reparacion->save();

        return redirect('/reparaciones/agregarOrdenTrabajo/'.$reparacion->id);
    }

    public function cancelar(Request $request)
    {
       Reparacion::destroy($request->idReparacion);
        
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

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
                ];
                
        $pdf = PDF::loadView('myPDF', $data);
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('itsolutionstuff.pdf');
    
    }

    public function generarReporte(Request $request)
    {


        $fechaEntrada=$request->get('inptFechaDesde');
       
        $fechaSalida=$request->get('inptFechaHasta');;
        $estado=$request->get('inptEstado');
        

        if ($fechaSalida==null) {
            $reparaciones= Reparacion::where([
                ['fechaDeEntrada','>=',$fechaEntrada],
                ['estado','=', $estado]
            ])->get();
        }
        else{

            $reparaciones= Reparacion::where([
                ['fechaDeEntrada','>=',$fechaEntrada],
                ['fechaDeSalida','<=',$fechaSalida],
                ['estado','=', $estado]
            ])->get();
    
        }


       
       if(sizeof($reparaciones)>0)
       {
            $tareasArray=[];
            $id_accionesArray=[];
            foreach ($reparaciones as $reparacion) {
                $ordenesTrabajo=$reparacion->ordenesTrabajo;

                foreach ($ordenesTrabajo as $orden) {
                    $tareas=$orden->tareas;
                    
                    foreach ($tareas as $tarea) {
                        $tareasArray[$tarea->id]=$tarea;

                        if (array_key_exists($tarea->id_accion, $id_accionesArray)) {
                            $id_accionesArray[$tarea->id_accion]=$id_accionesArray[$tarea->id_accion]+1;
                        }
                        else{
                            $id_accionesArray[$tarea->id_accion]=1;
                        }
                    }
                }
            
            }      

            
    
            $idsTarea=array_keys($tareasArray);
        
            // $piezas=Tarea_Pieza::all()->
            // groupBy('id_pieza')->map(function ($row) {
            //     return $row->sum('cantidad');
            // });

            $piezas=Tarea_Pieza::whereIn('id_tarea',$idsTarea)
            ->groupBy('id_pieza')
            ->selectRaw('sum(cantidad) as sum, id_pieza')
            ->pluck('sum','id_pieza');

        
            $piezasArray=[];
            foreach ($piezas as $id => $cantidad) {
            
                $pieza= Pieza::where('id',$id)->first();
                $datosPieza['nombre']=$pieza->nombre;
                $datosPieza['modelo']=$pieza->modelo;
                $datosPieza['fabricante']=$pieza->fabricante->nombre;
                $datosPieza['cantidad']=$cantidad;
                array_push($piezasArray,$datosPieza);
            }
            
        

            foreach ($id_accionesArray as $id => $cantidad) {
                $nombreAccion= Accion::where('id',$id)->get('nombre')->first();
                $acciones[$nombreAccion->nombre]=$cantidad;
            }


            return view('reporteDeReparaciones', [
                'reparaciones' => $reparaciones, 
                'acciones'=>$acciones,
                'piezas'=>$piezasArray,
                'fechaEntrada'=>$fechaEntrada,
                'fechaSalida'=>$fechaSalida,
                'estado'=>$estado,

            ]);
        }
        else{
            return view('reporteDeReparaciones', [
                'reparaciones' => null, 
                'acciones'=>null,
                'piezas'=>null,
                'fechaEntrada'=>$fechaEntrada,
                'fechaSalida'=>$fechaSalida,
                'estado'=>$estado,
    
            ]);
        }
    }
}
