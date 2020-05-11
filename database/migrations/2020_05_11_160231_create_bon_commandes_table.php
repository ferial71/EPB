<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('moyenHumaine');
            $table->string('moyenMateriel');
            $table->integer('manifeste_id')->unsigned();
            $table->foreign('manifeste_id')->references('id')->on('manifestes');
            $table->integer('emplacement_id')->unsigned();
            $table->foreign('emplacement_id')->references('id')->on('emplacements');
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
        Schema::dropIfExists('bon_commandes');
    }
}
