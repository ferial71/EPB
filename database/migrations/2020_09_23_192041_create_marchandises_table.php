<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchandises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('poids')->nullable();
            $table->string('nature')->nullable();
            $table->string('mode_conditionnement')->nullable();
            $table->unsignedBigInteger('cargaison_id');
            $table->timestamps();

            $table->foreign('cargaison_id')->references('id')->on('cargaisons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marchandises');
    }
}
