<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpquaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpquais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annonce_nav_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marchandise_id');
            $table->date('date');
            $table->time('estimation_temps_arriver');
            $table->string('rade');
            $table->timestamps();

            $table->foreign('marchandise_id')->references('id')->on('marchandises');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('annonce_nav_id')->references('id')->on('annonce_navs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dpquais');
    }
}
