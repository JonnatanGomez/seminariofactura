<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operacion';

    protected $fillable = [
        'total',
        'idcliente',
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/operacions/'.$this->getKey());
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
