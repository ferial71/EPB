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
            $table->date('dCreation')->nullable();
            $table->date('dValidation')->nullable();
            $table->string('valide')->nullable();
            $table->unsignedBigInteger('demande_poste_id');
            $table->unsignedBigInteger('cargaisons_id');

            $table->timestamps();

            $table->foreign('demande_poste_id')->references('id')->on('demande_poste');
            $table->foreign('cargaisons_id')->references('id')->on('cargaisons');
        });

        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('moyenHumaine');
            $table->string('moyenMateriel');
            $table->unsignedBigInteger('manifeste_id');
            $table->unsignedBigInteger('emplacement_id');

            $table->timestamps();

            $table->foreign('manifeste_id')->references('id')->on('manifestes');
            $table->foreign('emplacement_id')->references('id')->on('emplacements');
        });


        Schema::create('bon_enlevements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('emplacement_id');
            $table->unsignedBigInteger('transitaire_id');
            $table->unsignedBigInteger('marchandise_id');
            $table->timestamps();

            $table->foreign('emplacement_id')->references('id')->on('emplacements');
            $table->foreign('transitaire_id')->references('id')->on('transitaires');
            $table->foreign('marchandise_id')->references('id')->on('marchandises');
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
        Schema::dropIfExists('bon_commandes');
        Schema::dropIfExists('bon_enlevements');
    }
}
