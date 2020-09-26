<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_navs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('navire_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('armateur_id');
            $table->unsignedBigInteger('cargaison_id');
            $table->date('date_dentree');
            $table->timestamps();

            $table->foreign('navire_id')->references('id')->on('navires');
            $table->foreign('user_id')->references('id')->on('users');
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
    }
}
