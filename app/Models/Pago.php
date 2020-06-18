<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'prestamo_id',
        'number',
        'cantidad',
        'fechaPago',
        'abono',
        'fechaAbono'
    ];

    public function prestamo()
    {
        return $this->belongsTo('App\Models\Prestamo');
    }
    
}
