<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'enterprises';

    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('nit');
            $table->integer('telefono');
            $table->integer('pais')->unsigned();
            $table->foreign('pais')->references('id')->on('nacionalidads');
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
        Schema::dropIfExists('enterprises');
    }
}
