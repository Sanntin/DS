<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    use HasFactory;

    public function marca()
    {
     return $this->belongsTo('App\Models\Marca', 'id_marca');
    }

    public function modelo()
    {
     return $this->belongsTo('App\Models\Modelo', 'id_modelo');
    }

    public function cliente()
    {
     return $this->belongsTo('App\Models\Cliente','dniCliente','dni');
    }


}
