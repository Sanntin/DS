<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            
            return back()
            ->withInput()
            ->withErrors(['nickname'=>'La cuenta no puede ser válidada, intente nuevamente']);
        }
    }

    public function cerrar()
    {
        Auth::logout();

        session()->invalidate();
    
        session()->regenerateToken();
    
        return redirect('/');
    }
}
