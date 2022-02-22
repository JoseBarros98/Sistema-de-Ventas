<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->unsignedBigInteger("tipo_tela");
            $table->unsignedBigInteger('servicios');
            $table->unsignedBigInteger("pedido");
            $table->unsignedBigInteger("talla");
            
            $table->decimal('saldo',11,2);
            $table->decimal('debe',11,2);
            $table->decimal('precio_total',11,2);
            $table->string('Firma_Gerente');
            $table->string('Firma_Cliente');

            

            $table->foreign('servicios')
                ->references('id')->on('servicios')
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

            $table->foreign('pedido')
                ->references('id')->on('pedidos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
