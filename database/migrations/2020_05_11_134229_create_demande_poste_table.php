<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandePosteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_poste', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('annonceNav_id')->unsigned();
            $table->foreign('annonceNav_id')->references('id')->on('annonce_navs');
            $table->integer('transitaires_id')->unsigned();
            $table->foreign('transitaires_id')->references('id')->on('transitaires');
            $table->date('date');
            $table->time('ETA');
            $table->string('rade');

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
        Schema::dropIfExists('demande_poste');
    }
}
