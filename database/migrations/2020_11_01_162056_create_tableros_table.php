<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contacto_id');
            $table->foreign('contacto_id')->references('id')->on('contactos');

            $table->unsignedBigInteger('panel_id');
            $table->foreign('panel_id')->references('id')->on('panels');
            $table->integer('posicion');
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
        Schema::dropIfExists('tableros');
    }
}
