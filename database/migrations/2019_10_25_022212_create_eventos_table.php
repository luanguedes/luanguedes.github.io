<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table){
            $table->increments('id');
            $table->integer('local_id')->unsigned();
            $table->foreign('local_id')
                ->references('id')
                ->on('locals')
                ->onDelete('cascade');
            $table->string('nome', 80);
            $table->date('dataeve');
            $table->string('status');
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
