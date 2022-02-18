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
            $table->bigIncrements('id');
            $table->integer("idcliente")->unsigned();
            $table->datetime('fecha_pedido');
            $table->datetime('fecha_entrega');
            $table->text('descripcion');
            $table->unsignedBigInteger("tipo_tela");
            $table->unsignedBigInteger("talla");
            $table->integer('cantidad_talla');
            $table->decimal('total_venta', 11, 2);
            $table->decimal('debe', 11, 2);
            $table->decimal('saldo', 11, 2);
            $table->string('muestra', 50)->nullable()->default(null);
            $table->text('detalle_muestra');

            $table->foreign('idcliente')
                ->references('idpersona')->on('persona')
                ->onDelete('restrict')
                ->onUpdate('restrict'); 
        
            $table->foreign('tipo_tela')
                ->references('id')-> on('telas')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            
            $table->foreign('talla')
                ->references('id')-> on('tallas')
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
