<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'detalle_venta';

    /**
     * Run the migrations.
     * @table detalle_venta
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('iddetalle_venta');
            $table->integer("idventa", )->unsigned();
            $table->integer("idarticulo", )->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio_venta', 11, 2);
            $table->decimal('descuento', 11, 2);

            $table->foreign('idarticulo')
                ->references('idarticulo')->on('articulo')
                ->onDelete('restrict')
                ->onUpdate('restrict');
                
            $table->foreign('idventa')
                ->references('idventa')->on('venta')
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
        Schema::dropIfExists($this->tableName);
    }
}
