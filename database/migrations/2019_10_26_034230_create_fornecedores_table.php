<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table){
            $table->increments('id');
            $table->string('nomefan', 100);
            $table->string('razsoc', 100);
            $table->string('cnpj', 30);
            $table->string('endereco', 80);
            $table->string("numero", 15);
            $table->string("bairro", 50);
            $table->string("telefone", 15);
            $table->string("tipo", 20);
            $table->string("status", 15);
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
