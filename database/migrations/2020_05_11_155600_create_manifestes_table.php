<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifestes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('natureEscale');
            $table->date('dEstimation');
            $table->date('dCreation');
            $table->date('dValidation');
            $table->string('valide');
            $table->integer('demande_poste_id')->unsigned();
            $table->foreign('demande_poste_id')->references('id')->on('demande_poste');
            $table->integer('cargaisons_id')->unsigned();
            $table->foreign('cargaisons_id')->references('id')->on('cargaisons');
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
        Schema::dropIfExists('manifestes');
    }
}
