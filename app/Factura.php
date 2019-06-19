<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'cliente', 'impuesto', 'montoTotal', 'descripcion'
    ];
}
