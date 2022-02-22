<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ingreso';

    /**
     * Run the migrations.
     * @table ingreso
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('idingreso');
            $table->integer("idproveedor")->unsigned();
            $table->string('tipo_comprobante', 20);
            $table->string('serie_comprobante', 7)->nullable()->default(null);
            $table->string('num_comprobante', 10);
            $table->dateTime('fecha_hora');
            
            $table->string('estado', 20);

            


            $table->foreign('idproveedor')
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
