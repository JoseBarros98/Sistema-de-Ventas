<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'articulo';

    /**
     * Run the migrations.
     * @table articulo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('idarticulo');
            $table->string('codigo', 50)->nullable()->default(null);
            $table->string('nombre', 100);
            $table->integer('stock');
            $table->string('descripcion')->nullable()->default(null);
            $table->string('imagen', 50)->nullable()->default(null);
            $table->string('estado', 20);

            $table->integer("idcategoria",)->unsigned();


            $table->foreign('idcategoria')
                ->references('idcategoria')->on('categoria')
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
