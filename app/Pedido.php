<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedidos';

    protected $fillable=[
        'fecha_pedido',
        'fecha_entrega',
        'tipo_comprobante',
        'num_comprobante',
        'idcliente',
        'saldo',
        'debe',
        'precio_total',
        'Firma_gerente',
        'Firma_cliete',
    ];
    protected $guarded=[];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function detalle_pedidos(){
        return $this->belongsTo(DetallePedido::class);
    }
    public function servicios(){
        return $this->belongsTo(servicio::class);
    }
    public function telas(){
        return $this->belongsTo(Tela::class);
    }
    public function tallas(){
        return $this->belongsTo(Talla::class);
    }
}
