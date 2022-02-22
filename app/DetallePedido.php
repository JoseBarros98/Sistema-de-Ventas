<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    

    public function telas(){
        return $this->belongsTo(Tela::class);
    }
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
