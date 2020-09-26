<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonEnlevementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_enlevements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('emplacement_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marchandise_id');
            $table->timestamps();

            $table->foreign('emplacement_id')->references('id')->on('emplacements');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('bon_enlevements');
    }
}
