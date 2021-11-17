<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
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
       Cliente::destroy($request->idCliente);
    }

}
