<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_postes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consignataire_id')->unsigned();
            $table->foreign('consignataire_id')->references('id')->on('consignataire');
            $table->integer('navire_id')->unsigned();
            $table->foreign('navire_id')->references('id')->on('navire');
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
        Schema::dropIfExists('demande_postes');
    }
}
