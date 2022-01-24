<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='idpersona';


    protected $fillable=[
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email',
        'pais',
        'gener',

    ];

    protected $guarded =[


    ];
}
