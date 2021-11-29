<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tarea;


class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'porcentajeAvance',
        'horasTotales',
        'id_reparacion',
    ];

    public function reparacion()
    {
     return $this->belongsTo('App\Models\Reparacion','id_reparacion','id');
    }
    public function tareas()
    {
     return $this->hasMany('App\Models\Tarea','id_ordenTrabajo','id');
    }

    protected static function boot() {
        parent::boot();
    
        static::deleting(function(OrdenTrabajo $ordenTrabajo) {
          
                foreach ($ordenTrabajo->tareas as $tarea) {
                    Tarea::destroy($tarea->id);
                }
        });
        }

}
