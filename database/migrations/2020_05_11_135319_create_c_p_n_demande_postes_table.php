<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPNDemandePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_n_demande_postes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('demande_poste_id')->unsigned();
            $table->foreign('demande_poste_id')->references('id')->on('demande_poste');
            $table->integer('c_p_n_s_id')->unsigned();
            $table->foreign('c_p_n_s_id')->references('id')->on('c_p_n_s');
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
        Schema::dropIfExists('c_p_n_demande_postes');
    }
}
