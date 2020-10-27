<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('heur_entree');
            $table->dateTime('heur_sortie');
            $table->text('consignes');
            $table->unsignedBigInteger('navire_id');
            $table->unsignedBigInteger('quai_id');
            $table->timestamps();

            $table->foreign('navire_id')->references('id')->on('navires');
            $table->foreign('quai_id')->references('id')->on('quais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpns');
    }
}
