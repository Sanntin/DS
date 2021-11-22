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
        return view('clientes', ['clientes' => DB::table('clientes')->paginate(7)]);
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
        $vehiculos= Vehiculo ::where('dniCliente',$cliente->dni)->get();
        $reparaciones= Reparacion ::where('dniCliente',$cliente->dni)->get();
        
        foreach ($vehiculos as $vehiculo) {

            Vehiculo::destroy($vehiculo->id);
        }

        foreach ($reparaciones as $reparacion) {

            Reparacion::destroy($reparacion->id);
        }
        Cliente::destroy($request->idCliente);
    }

    public function datosClienteElegido($id)
    {
        # code...
    }

}
