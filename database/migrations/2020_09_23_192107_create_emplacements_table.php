<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplacements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ligne');
            $table->integer('collone');
            $table->integer('altitude');
            $table->unsignedBigInteger('marchandise_id');
            $table->timestamps();

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
        Schema::dropIfExists('emplacements');
    }
}
