<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Cliente;
use App\Models\Tarea_Pieza;
use App\Models\Tarea;
use App\Models\Accion;
use App\Models\Pieza;
use PDF;

class ReparacionController extends Controller
{
    public function obtenerReparaciones()
    {

        $repporpagina=11;
        if(session()->has('campo') ){
            $searchTerm=session()->get('campo');

            $dniCliente = Cliente::where('nombre', 'LIKE',"%$searchTerm%")
            ->orWhere('apellido', 'LIKE', "%{$searchTerm}%")->get('dni');
            
            $dnis=[];
            foreach ($dniCliente->toArray() as $key => $value) {
               array_push($dnis,$value['dni']);
            }


            $reparaciones=Reparacion::where('fechaDeEntrada', 'LIKE',"%$searchTerm%")
            ->orWhere('motivo', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('kilometraje', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('fechaDeSalida', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('estado', 'LIKE', "%{$searchTerm}%") 
            ->orWhereIn('dniCliente',$dnis) 
            ->orWhere('patente', 'LIKE', "%{$searchTerm}%") 
            ->latest('fechaDeEntrada')->paginate($repporpagina);

            session()->flash('campo', $searchTerm);
          

            return view('reparaciones', ['reparaciones' =>$reparaciones]);
        }
        else{
            return view('reparaciones', ['reparaciones' => Reparacion::latest('fechaDeEntrada')->paginate($repporpagina)]);
        }
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

     
        // return view('pdf', ['reparacion' => $reparacion,'tareas'=> $tareas,'totalHoras'=>$totalHoras,'totalprecio'=>$totalprecio]);
        
        // $pdf = PDF::loadView('comprobante', compact('reparacion','tareas','totalHoras','totalprecio'));
        // $pdf = \PDF::loadView('pdf',['reparacion' => $reparacion,'tareas'=> $tareas,'totalHoras'=>$totalHoras,'totalprecio'=>$totalprecio]);
        
        $pdf = PDF::loadView('pdf',['reparacion' => $reparacion,'tareas'=> $tareas,'totalHoras'=>$totalHoras,'totalprecio'=>$totalprecio]);
        $nombreArchivo='Comprobante_'.$reparacion[0]->patente."_".$reparacion[0]->cliente->apellido.$reparacion[0]->cliente->nombre."_".$reparacion[0]->fechaDeEntrada;
        return $pdf->download($nombreArchivo.'.pdf');
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        //         ];
                
        // $pdf = PDF::loadView('myPDF', $data);
        // $pdf = PDF::loadView('myPDF', $data);
        // return $pdf->download('itsolutionstuff.pdf');
    
    }

    public function generarReporte(Request $request)
    {


        $fechaDesde=$request->get('inptFechaDesde');
       
        $fechaHasta=$request->get('inptFechaHasta');;
        $estado=$request->get('inptEstado');
        

        if ($fechaHasta==null) {
            $reparaciones= Reparacion::where([
                ['fechaDeEntrada','>=',$fechaDesde],
                ['estado','=', $estado]
            ])->get();
        }
        else{

            $reparaciones= Reparacion::where([
                ['fechaDeEntrada','>=',$fechaDesde],
                ['fechaDeEntrada','<=',$fechaHasta],
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

            if($acciones==null){
                $acciones=[];
            }

            return view('reporteDeReparaciones', [
                'reparaciones' => $reparaciones, 
                'acciones'=>$acciones,
                'piezas'=>$piezasArray,
                'fechaDesde'=>$fechaDesde,
                'fechaHasta'=>$fechaHasta,
                'estado'=>$estado,

            ]);
        }
        else{
            return view('reporteDeReparaciones', [
                'reparaciones' => null, 
                'acciones'=>null,
                'piezas'=>null,
                'fechaDesde'=>$fechaDesde,
                'fechaHasta'=>$fechaHasta,
                'estado'=>$estado,
    
            ]);
        }
    }

    public function filtrar(Request $request)
    {

        $searchTerm=$request->get('campo');
 
        
        // $reparaciones=Reparacion::where('fechaDeEntrada', 'LIKE', "%{$searchTerm}%")->get();
        // $reparaciones=Reparacion::where('patente', 'LIKE',"%$searchTerm%")->latest('fechaDeEntrada')->paginate(2);


        // dd($reparaciones);
        // ->orWhere('motivo', 'LIKE', "%{$searchTerm}%") 

        return redirect('reparaciones')->with('campo', $searchTerm);
      
    
    }
}
