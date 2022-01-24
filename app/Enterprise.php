<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table='enterprises';

    protected $primaryKey='id';
    
    protected $fillable=[
        'nombre',
        'nit',
        'telefono',
        'pais',
    ];
    protected $guarded=[];
}
