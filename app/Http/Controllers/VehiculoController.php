<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cliente;

class VehiculoController extends Controller
{
    public function obtenerVehiculo()
    {
        return view('vehiculos', ['vehiculos' => Vehiculo::paginate(7)]);
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
   
        $data=$request->all();
        $vehiculo= new Vehiculo;
        $vehiculo->patente=$data['patente'];
        $vehiculo->año=$data['anio'];
        $vehiculo->dniCliente=$data['cliente'];
        $vehiculo->id_marca=$data['marca'];
        $vehiculo->id_modelo=$data['modelo'];

        $vehiculo->save();

        return redirect('vehiculos');
    // $atributos=request()->validate([
    //     'nombre'=> 'required',
    //     'apellido'=> 'required',
    //     'direccion'=> 'required',
    //     'telefono'=> 'required|numeric|digits:11',
    //     'email'=> 'required|email|unique:users,email',
    //     'nickname'=> 'required|min:5|unique:users,nickname',
    //     'password'=> 'required|min:8',
    //   ]);

    //   User::create($atributos);

    //   session()->flash('mensajeUsuario','La cuenta a sido creada correctamente, por favor inicie sesión');

    //   return redirect('login');
    }
}
