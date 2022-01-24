<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'persona';

    /**
     * Run the migrations.
     * @table persona
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            
            $table->increments('idpersona');
            $table->string('tipo_persona', 20);
            $table->string('nombre', 100);
            $table->string('tipo_documento', 20)->nullable()->default(null);
            $table->string('num_documento', 15)->nullable()->default(null);
            $table->string('direccion', 70)->nullable()->default(null);
            $table->string('telefono', 15)->nullable()->default(null);
            $table->string('email', 250)->nullable()->default(null);

            $table->integer('gener')->unsigned();
            $table->foreign('gener')->references('id')->on('generos');
            
            $table->integer('pais')->unsigned();
            $table->foreign('pais')->references('id')->on('nacionalidads');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
