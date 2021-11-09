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
}
