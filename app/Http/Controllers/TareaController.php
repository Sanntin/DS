<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function completar(Request $request)
    {
            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            $tarea = Tarea::find($request->idTarea)->update(['estado' => 'completada']);
            return  response()->json("hola");
    }
}
