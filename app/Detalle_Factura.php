<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'factura_id', 'producto_id', 'precio', 'cantidad', 'iva'
    ];
}
