<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'detalle_ingreso';

    /**
     * Run the migrations.
     * @table detalle_ingreso
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('iddetalle_ingreso');
            $table->integer("idingreso", )->unsigned();
            $table->integer("idarticulo", )->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio_compra', 11, 2);
            $table->decimal('precio_venta', 11, 2);

            


            $table->foreign('idarticulo')
                ->references('idarticulo')->on('articulo')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('idingreso')
                ->references('idingreso')->on('ingreso')
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
