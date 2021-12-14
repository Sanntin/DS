<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Pieza;
use App\Models\Fabricante;
use App\Mail\TestMail;


class PiezaController extends Controller
{
    public function obtenerPiezas()
    {

        $repporpagina=11;
        if(session()->has('campoS') ){
            $searchTerm=session()->get('campoS');


            if(is_numeric($searchTerm)){
                $piezas=Pieza::where('cantidad',$searchTerm)
                ->orWhere('precio',$searchTerm) 
                ->paginate($repporpagina);


                session()->flash('campoS', $searchTerm);
            
                return view('stock', ['piezas' => $piezas]);
            }
            else{
                $idFabricante = Fabricante::where('nombre', 'LIKE',"%$searchTerm%")->get('id');
                
                $fabricantes=[];
                foreach ($idFabricante->toArray() as $key => $value) {
                array_push($fabricantes,$value['id']);
                }
                $piezas=Pieza::where('nombre', 'LIKE',"%$searchTerm%")
                ->orWhere('modelo', 'LIKE', "%{$searchTerm}%") 
                ->orWhereIn('id_fabricante',$fabricantes) 
                ->paginate($repporpagina);


                session()->flash('campoS', $searchTerm);
            
                return view('stock', ['piezas' => $piezas]);
            }

        }
        else{
            return view('stock', ['piezas' => Pieza::paginate($repporpagina)]);
    
        }
     
    }

    public function precioPieza(Request $request)
    {
        if ($request->has('_token')) {
            $precio = Pieza::where('id',$request->id)->get(['precio','cantidad']);
             return  response()->json($precio);
        }
    
    }

    public function realizarpedidoForm($id)
    {
        session()->flash('idPieza',$id);
        $pieza= Pieza::where('id',$id)->first();
        return view('realizarPedido',['pieza'=>$pieza]);
    }

    public function enviarPedido()
    {
        $id=session()->get('idPieza');
        $pieza=Pieza::where('id',$id)->first();
        if($pieza!=null){
            $atributos=request()->validate([
                'cantidad'=> 'required|integer|min:1',
            ]);

            $datos =[ 
                'titulo'=> "[INFOMEC]: Pedido de piezas" ,
                'body'=> "Se desea realizar el siguiente pedido: ".$atributos['cantidad']." unidades de: ". $pieza->nombre. " modelo ". $pieza->modelo,
            ];

            $mail=$pieza->fabricante->mail;

            Mail::to($mail)->send(new TestMail($datos));

            return redirect('stock');
    
        }
        return back()->with('errorId','Hubo un error por favor reintente');
    }

    public function cargarStockForm($id)
    {
        session()->flash('idPieza',$id);
        $pieza= Pieza::where('id',$id)->first();
        return view('cargarStock',['pieza'=>$pieza]);
    }

    public function guardarStock()
    {
        $id=session()->get('idPieza');
        $pieza=Pieza::where('id',$id)->first();
       
        if($pieza!=null){
            $atributos=request()->validate([
                'cantidad'=> 'required|integer|min:0',
                'precio'=> 'required|numeric',
            ]);

            $pieza->cantidad=$atributos['cantidad']+$pieza->cantidad;
            $pieza->precio=$atributos['precio'];

            $pieza->save();

            return redirect('stock');
    
        }
        return back()->with('errorId','Hubo un error por favor reintente');
    }

    public function filtrar(Request $request)
    {

        $searchTerm=$request->get('campo');
 
        return redirect('stock')->with('campoS', $searchTerm);
      
    
    }
}
