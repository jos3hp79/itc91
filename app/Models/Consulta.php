<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'Nombre',
        'Telefono',
        'edad',
        'Fechadecita',
    
    ];
    
    
    protected $dates = [
        'Fechadecita',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/consultas/'.$this->getKey());
    }
}
