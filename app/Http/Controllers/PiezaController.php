<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pieza;

class PiezaController extends Controller
{
    public function obtenerPiezas()
    {
        return view('stock', ['piezas' => Pieza::paginate(7)]);
    }

    public function precioPieza(Request $request)
    {
        if ($request->has('_token')) {
            $precio = Pieza::where('id',$request->id)->get('precio');

             return  response()->json($precio);
        }
    
    }
}
