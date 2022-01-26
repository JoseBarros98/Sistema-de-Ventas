<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table='enterprises';

    protected $primaryKey='id';
    
    protected $fillable=[
        'id',
        'nombre',
        'nit',
        'telefono',
        'pais',
    ];
    protected $guarded=[];
    public function nacionalidads(){
        return $this->belongsTo(Nacionalidad::class);
    }
}
