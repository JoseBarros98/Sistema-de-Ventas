<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'venta';

    /**
     * Run the migrations.
     * @table venta
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('idventa');
            $table->string('tipo_comprobante', 20);
            $table->string('serie_comprobante', 7);
            $table->string('num_comprobante', 10);
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 4, 2);
            $table->decimal('total_venta', 11, 2);
            $table->string('estado', 20);
            $table->integer("idcliente")->unsigned();
            $table->foreign('idcliente')
                ->references('idpersona')->on('persona')
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
