<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pedido');
            $table->unsignedBigInteger('cod_pedido');
            $table->integer("idcliente")->unsigned();
            $table->datetime('fecha_pedido');
            $table->datetime('fecha_entrega');
            $table->string('tipo_comprobante',20);
            $table->string('num_comprobante', 10);
            $table->string('muestra', 50)->nullable()->default(null);
            $table->text('detalle_muestra');
            
            
            

            $table->foreign('idcliente')
                    ->references('idpersona')->on('persona')
                    ->onDelete('restrict')
                    ->onUpdate('restrict'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
