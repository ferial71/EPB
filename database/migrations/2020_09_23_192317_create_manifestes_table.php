<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifestes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('natureEscale');
            $table->date('dEstimation');
            $table->date('dCreation')->nullable();
            $table->date('dValidation')->nullable();
            $table->string('valide')->nullable();
            $table->unsignedBigInteger('dpquai_id');
            $table->unsignedBigInteger('cargaisons_id');

            $table->timestamps();

            $table->foreign('dpquai_id')->references('id')->on('dpquais');
            $table->foreign('cargaisons_id')->references('id')->on('cargaisons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manifestes');
    }
}
