<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table){
            $table->increments('id');
            $table->integer('pais')->unsigned();
            $table->foreign('pais')
                ->references('id')
                ->on('paises')
                ->onDelete('cascade');
            $table->string('nome', 75);
            $table->string('uf', 2);
            $table->integer('ibge');
            $table->string('ddd', 50);
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
        //
    }
}
