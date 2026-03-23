<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model {
    
    protected $table = 'propiedades';

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'banios',
        'habitaciones',
        'metros_cuadrados',
        'operacion_id',
        'tipo_propiedad_id'
    ];

    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }

    public function tipoPropiedad()
    {
        return $this->belongsTo(TipoPropiedad::class);
    }

    public function imagenes()
    {
        return $this->hasMany(PropiedadImagen::class);
    }
}
