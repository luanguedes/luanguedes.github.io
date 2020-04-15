<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table){
            $table->increments('id');
            $table->integer('uf')->unsigned();
            $table->foreign('uf')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');
            $table->string('nome', 120);
            $table->integer('ibge');
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
