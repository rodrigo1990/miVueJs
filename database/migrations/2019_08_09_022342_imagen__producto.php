<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagenProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Imagen_Producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('tipo_id');

            $table->foreign('producto_id')->references('id')->on('Producto');

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
