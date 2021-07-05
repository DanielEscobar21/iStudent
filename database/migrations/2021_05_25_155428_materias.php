<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function(Blueprint $table ){
            $table->id();
            $table->string('clave_materia');
            $table->string('nombre_materia');
            $table->bigInteger('id_user');
            $table->text('descripcion')->nullable();
            $table->Integer('cantUni')->nullable();
            $table->Integer('maxAlu')->nullable();
            //$table->date('deleteAt')->nullable();
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
        Schema::dropIfExists('materias');
    }
}
