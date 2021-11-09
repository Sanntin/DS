<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;


    public function pieza()
    {
     return $this->belongsToMany(Pieza::class,'tarea__piezas','id_tarea','id_pieza')->withPivot('cantidad', 'precio');
    }



    public function accion()
    {
        return $this->belongsTo(Accion::class, 'id_accion', 'id');
    }

}
