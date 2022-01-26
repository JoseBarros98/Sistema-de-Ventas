<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table='nacionalidads';

    protected $primaryKey='id';

    protected $fillable=[
        'id',
        'pais',
    ];
    protected $guarded=[];
}
