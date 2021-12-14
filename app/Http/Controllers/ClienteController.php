<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Reparacion;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{

    public function obtenerClientes()
    {

        $repporpagina=11;
        if(session()->has('campoC') ){
            $searchTerm=session()->get('campoC');


            $clientes=Cliente::where('dni', 'LIKE',"%$searchTerm%")
            ->orWhere('nombre', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('apellido', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('telefono', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('localidad', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('direccion', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('mail', 'LIKE', "%{$searchTerm}%") 
            ->where('status',1) 
            ->paginate($repporpagina);


            session()->flash('campoC', $searchTerm);
          

            return view('clientes', ['clientes' =>$clientes]);
        }
        else{
            return view('clientes', ['clientes' => DB::table('clientes')->where('status',1)->paginate($repporpagina)]);
        }

    }

    public function getClientes()
    {
        $array=[];
        $array['clientes']  =  Cliente ::all();

        return  response()->json($array);
    }

    public function agregarCliente()
    {
            $atributos=request()->validate([
                'nombre'=> 'required',
                'apellido'=> 'required',
                'direccion'=> 'required',
                'localidad'=> 'required',
                'telefono'=> 'required|numeric|digits:11',
                'mail'=> 'required|email|unique:clientes,mail',
                'dni'=> 'required|numeric|digits:8|unique:clientes,dni',
              ]);
              Cliente::create($atributos);
        
              return redirect('clientes');
    }

    public function eliminarCliente(Request $request)
    {
        $cliente=Cliente::where('id',$request->idCliente)->first();

        $cliente->status=0;
        $cliente->save();
    }

    public function datosClienteElegido($id)
    {
        session()->flash('idCliente',$id);
        return view('modificarCliente', ['cliente' => Cliente::where('id',$id)->first()]);
    }

    public function modificarCliente(Request $request)
    {
        // dd( session()->has('idCliente'));
        $id=session()->get('idCliente');
        $cliente=Cliente::where('id',$id)->first();
       if ( $cliente!=null) {

            $atributos=request()->validate([
                'nombre'=> 'required',
                'apellido'=> 'required',
                'direccion'=> 'required',
                'localidad'=> 'required',
                'telefono'=> 'required|numeric|digits:11',
                'mail'=> 'required|email|unique:clientes,mail,'.$id,
            ]);

            $cliente->nombre=$atributos['nombre'];
            $cliente->apellido=$atributos['apellido'];
            $cliente->telefono=$atributos['telefono'];
            $cliente->mail=$atributos['mail'];
            $cliente->direccion=$atributos['direccion'];
            $cliente->localidad=$atributos['localidad'];

            $cliente->save();   
            return redirect('clientes');
        
        }
        return back()->with('errorId','Hubo un error por favor reintente');
        }

        public function filtrar(Request $request)
        {
    
            $searchTerm=$request->get('campo');
     
            return redirect('clientes')->with('campoC', $searchTerm);
          
        
        }

}
