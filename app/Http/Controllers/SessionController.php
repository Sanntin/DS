<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   
    public function destroy()
    {
        auth()->logout();

       return redirect('/login')->with('mensajeUsuario','Sesión cerrada exitosamente');
    }

    public function login()
    {
       $atributos = request()->validate([
            'nickname'=>'required',
            'password'=>'required'
        ]);

        
        if (auth()->attempt($atributos)){

            return redirect('reparaciones');
        }
        {
            dd(($atributos));
            // return back()
            // ->withInput()
            // ->withErrors(['nickname'=>'La cuenta no puede ser válidada, intente nuevamente']);
        }
    }

}
