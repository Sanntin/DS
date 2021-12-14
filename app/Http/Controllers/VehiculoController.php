<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    public function obtenerVehiculo()
    {

        $repporpagina=11;
        if(session()->has('campoV') ){
            $searchTerm=session()->get('campoV');


            
            $dniCliente = Cliente::where('nombre', 'LIKE',"%$searchTerm%")
            ->orWhere('apellido', 'LIKE', "%{$searchTerm}%")->get('dni');
            
            $dnis=[];
            foreach ($dniCliente->toArray() as $key => $value) {
               array_push($dnis,$value['dni']);
            }

            $id_marcas=Marca::where('nombre', 'LIKE',"%$searchTerm%")->get('id');

            $marcas=[];
            foreach ($id_marcas->toArray() as $key => $value) {
               array_push($marcas,$value['id']);
            }

        
            $id_modelos=Modelo::where('nombre', 'LIKE',"%$searchTerm%")->get('id');

            $modelos=[];
            foreach ($id_modelos->toArray() as $key => $value) {
               array_push($modelos,$value['id']);
            }

            $vehiculos=Vehiculo::where('patente', 'LIKE',"%$searchTerm%")
            ->orWhere('año', 'LIKE', "%{$searchTerm}%") 
            ->orWhereIn('dniCliente',$dnis) 
            ->orWhereIn('id_modelo',$modelos) 
            ->orWhereIn('id_marca',$marcas) 
            ->paginate($repporpagina);


            session()->flash('campoV', $searchTerm);
          

            return view('vehiculos', ['vehiculos' =>$vehiculos]);
        }
        else{
            return view('vehiculos', ['vehiculos' => Vehiculo::paginate($repporpagina)]);
        }
    }


    public function datosAgregarVehiculo(Request $request){
     
    
        if ($request->has('_token')) {
            $array=[];
            $array['marcas']  =  Marca ::all();
            $array['modelos'] =  Modelo ::all();
            $array['clientes']  =  Cliente ::all();

             return  response()->json($array);
        }
    
        // Que hacer si no tiene token
        // return view('vehiculos', ['vehiculos' => Vehiculo::paginate(7)]);
    }

    public function obtenerVehiculoCliente(Request $request)
    {
       
        if ($request->has('_token')) {
            $array=[];
            $array['vehiculos']  =  Vehiculo ::where('dniCliente',$request->id)->get();
             return  response()->json($array);
        }
    
    }

    public function agregarVehiculo(Request $request)
    {
      

        $validator = Validator::make($request->all(), [
            'patente'=> ['regex:/^[A-Z]{3}[0-9]{3}$/',
                    'unique:vehiculos,patente'],
            'año'=> 'required',
            'dniCliente'=> 'required',
            'id_marca'=> 'required',
            'id_modelo'=> 'required',
        ]);
    
        if ($validator->fails()) {
            $marcas =  Marca ::all();
            $modelos =  Modelo ::all();
            $clientes  =  Cliente ::all();
            session()->flash('errorEnCargar', true);
            session()->flash('marcas', $marcas);
            session()->flash('modelos',  $modelos);
            session()->flash('clientes', $clientes);
            return redirect('vehiculos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $atributos=$validator->valid();
        unset($atributos['_token']);
        Vehiculo::create($atributos);

        return redirect('vehiculos');

    }

    public function cambiarTitularidadForm($id)
    {
        session()->flash('idVehiculo',$id);
       $vehiculo=Vehiculo::where('id',$id)->first();
       $idCliente=$vehiculo->cliente->id;
       $clientes = Cliente::where('status',1)
                            ->where('id', '!=' , $idCliente)->get();
        return view('cambiarTitularidad',['vehiculo'=>$vehiculo,'clientes'=>$clientes]);
    }

    public function cambiarTitularidad(Request $request)
    {
        $id=session()->get('idVehiculo');
        $vehiculo=Vehiculo::where('id',$id)->first();
       if ( $vehiculo!=null) {

        $vehiculo->dniCliente=$request->cliente;
        $vehiculo->save();
            return redirect('vehiculos');
        
        }
        return back()->with('errorId','Hubo un error por favor reintente');
        }


        public function filtrar(Request $request)
        {
    
            $searchTerm=$request->get('campo');
     
            
    
            return redirect('vehiculos')->with('campoV', $searchTerm);
          
        
        }
    
}
