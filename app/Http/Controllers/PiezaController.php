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

}
