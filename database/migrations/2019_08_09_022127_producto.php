<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo');
            $table->decimal('precio',10,2);
            $table->unsignedInteger('marca_id');
            $table->unsignedInteger('categoria_id');

            $table->foreign('marca_id')->references('id')->on('Marca');
            $table->foreign('categoria_id')->references('id')->on('Categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimientos');
    }
}
