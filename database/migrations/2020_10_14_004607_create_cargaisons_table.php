<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargaisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('tonnage')->nullable();
            $table->integer('nombreColis')->nullable();
            $table->unsignedBigInteger('navire_id');
            $table->timestamps();

            $table->foreign('navire_id')->references('id')->on('navires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargaisons');
    }
}
