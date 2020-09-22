<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaviresTable extends Migration
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
            $table->timestamps();

        });
        Schema::create('adresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rue');
            $table->string('cite');
            $table->string('etat');
            $table->string('paye');
            $table->string('code_postale');
            $table->timestamps();
        });


        Schema::create('armateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->unique();
            $table->string('nationalite')->nullable();
            $table->timestamps();
        });


        Schema::create('navires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('armateur_id');
            $table->string('nom')->unique();
            $table->string('pavillon');
            $table->string('longeur');
            $table->string('largeur');
            $table->float('imo');
            $table->float('port_lourd');
            $table->float('tirant_eau');
            $table->float('poids')->nullable();
            $table->string('type');
            $table->timestamps();

            $table->foreign('armateur_id')->references('id')->on('armateurs');
        });



        Schema::create('consignataires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('adresse_id')->nullable();

            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('numero_tel')->nullable();
            $table->string('numero_tel_fix')->nullable();
            $table->string('numero_fax')->nullable();
            $table->timestamps();

            $table->foreign('adresse_id')->references('id')->on('adresses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('annonce_navs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('navire_id');
            $table->unsignedBigInteger('consignataire_id');
            $table->unsignedBigInteger('armateur_id');
            $table->unsignedBigInteger('cargaison_id');
            $table->date('date_dentree');
            $table->timestamps();

            $table->foreign('navire_id')->references('id')->on('navires');
            $table->foreign('consignataire_id')->references('id')->on('consignataires');
            $table->foreign('armateur_id')->references('id')->on('armateurs');
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




        Schema::dropIfExists('annonce_navs');

        Schema::dropIfExists('consignataires');
        Schema::dropIfExists('adresses');
        Schema::dropIfExists('navires');
        Schema::dropIfExists('cargaisons');
        Schema::dropIfExists('armateurs');
    }
}
