<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class SessionController extends Controller
{
   
    public function destroy()
    {
        auth()->logout();

       return redirect('/login')->with('mensajeUsuario','Sesión cerrada exitosamente');
    }

    public function login(Request $request)
    {
       $atributos = request()->validate([
            'nickname'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt(['nickname' => $request->nickname, 'password' => $request->password]) and User::where('nickname',request()->nickname)->first()->status){

            return redirect('reparaciones');
        }
        else{
            
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

    public function modificar()
    {

        // Falta poder cambiar la contraseña, hay que pedir la acutal y la nueva
        $user=auth()->user();
        $id=$user->id;
        $atributos=request()->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required|numeric|digits:11',
            'email'=> 'required|email|unique:users,email,'.$id,
        ]);

        $user->nombre=$atributos['nombre'];
        $user->apellido=$atributos['apellido'];
        $user->direccion=$atributos['direccion'];
        $user->telefono=$atributos['telefono'];
        $user->email=$atributos['email'];

        $user->save();
        return redirect('usuario');
    }
}
