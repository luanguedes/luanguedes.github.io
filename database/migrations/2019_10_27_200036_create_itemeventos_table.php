<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemeventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemeventos', function (Blueprint $table){
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')
                ->references('id')
                ->on('eventos')
                ->onDelete('cascade');
            $table->string('nome', 120);
            $table->float('valor');
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
