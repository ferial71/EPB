<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->nullable();
            $table->json('champs');
            $table->boolean('valide')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulaires');
    }
}
