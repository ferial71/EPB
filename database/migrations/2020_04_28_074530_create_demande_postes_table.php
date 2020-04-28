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
            $table->foreign('consignataire_id')
                ->references('id')->on('consignataire')
                ->onDelete('cascade');
            $table->foreign('transitaire_id')
                ->references('id')->on('transitaire')
                ->onDelete('cascade');
            $table->foreign('navire_id')
                ->references('id')->on('navire')
                ->onDelete('cascade');

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
