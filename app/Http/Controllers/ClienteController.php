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

}
