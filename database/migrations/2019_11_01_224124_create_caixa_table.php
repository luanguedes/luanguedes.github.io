<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixa', function (Blueprint $table){
            $table->increments('id');
            $table->integer('inscricao_id')->unsigned();
            $table->foreign('inscricao_id')
                ->references('id')
                ->on('inscricoes')
                ->onDelete('cascade');
            $table->float('valor');
            $table->string('status', 20);
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
