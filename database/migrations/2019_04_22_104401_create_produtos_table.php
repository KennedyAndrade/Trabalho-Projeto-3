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
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->string('autor')->nullable();
            $table->date('dt_emissao')->nullable();
            $table->decimal('preco',10,2)->default(0);
            $table->boolean('desconto')->default(0);
            $table->decimal('preco_desconto')->default(0);
            $table->string('foto')->nullable();
            $table->string('arquivo')->nullable();
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
