<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalesTable extends Migration
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
            $table->integer('tonnage')->nullable();
            $table->integer('nombreColis')->nullable();
            $table->unsignedBigInteger('navire_id');
            $table->timestamps();

            $table->foreign('navire_id')->references('id')->on('navires');
        });

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




        Schema::create('emplacements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('transitaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_tel')->nullable();
            $table->string('numero_tel_fix')->nullable();
            $table->string('numero_fax')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('dpquais', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('annonce_nav_id');
            $table->unsignedBigInteger('transitaire_id');
            $table->unsignedBigInteger('marchandise_id');
            $table->date('date');
            $table->time('estimation_temps_arriver');
            $table->string('rade');
            $table->timestamps();

            $table->foreign('marchandise_id')->references('id')->on('marchandises');
            $table->foreign('transitaire_id')->references('id')->on('transitaires');
            $table->foreign('annonce_nav_id')->references('id')->on('annonce_navs');
        });


        Schema::create('cpns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('heur_entree');
            $table->dateTime('heur_sortie');
            $table->text('consignes');
            $table->timestamps();
        });


        Schema::create('escales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('quais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
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
        Schema::dropIfExists('cargaisons');
        Schema::dropIfExists('marchandises');

        Schema::dropIfExists('emplacements');
        Schema::dropIfExists('transitaires');
        Schema::dropIfExists('dpquais');
        Schema::dropIfExists('cpns');
        Schema::dropIfExists('escales');
        Schema::dropIfExists('quais');
    }
}
