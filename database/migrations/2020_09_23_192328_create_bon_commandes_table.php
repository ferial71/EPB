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
            $table->unsignedBigInteger('manifeste_id');
            $table->unsignedBigInteger('emplacement_id');

            $table->timestamps();

            $table->foreign('manifeste_id')->references('id')->on('manifestes');
            $table->foreign('emplacement_id')->references('id')->on('emplacements');
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
