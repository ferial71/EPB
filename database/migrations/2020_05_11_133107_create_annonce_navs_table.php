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
            $table->integer('consignataire_id')->unsigned();
            $table->foreign('consignataire_id')->references('id')->on('consignataire');
            $table->integer('navire_id')->unsigned();
            $table->foreign('navire_id')->references('id')->on('navire');
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
        Schema::dropIfExists('annonce_navs');
    }
}
