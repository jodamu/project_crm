<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contacto_id');
            $table->foreign('contacto_id')->references('id')->on('contactos');
            $table->dateTime('start_event')->nullable();
            $table->dateTime('end_event')->nullable();
            $table->string('color')->nullable();
            $table->string('text_color')->nullable();
            $table->boolean('allday')->default(0);
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
        Schema::dropIfExists('eventos');
    }
}
