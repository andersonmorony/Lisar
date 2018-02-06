<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('categoria_id');	
            $table->string('titulo_produto')->nullable();
            $table->string('descricao')->nullable();
            $table->double('valor_inicial', 8, 2)->nullable();
            $table->date('data_divulgacao')->nullable();
            $table->time('hora_inicial')->nullable();
            $table->date('data_final')->nullable();
            $table->time('hora_final')->nullable();
            $table->boolean('cancelado')->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
