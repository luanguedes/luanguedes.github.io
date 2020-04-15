<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table){
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')
                ->references('id')
                ->on('eventos')
                ->onDelete('cascade');
            $table->string('nome', 80);
            $table->string('genero', 20);
            $table->string('status', 15);
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
