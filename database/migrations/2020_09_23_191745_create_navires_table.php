<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaviresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('armateur_id');
            $table->string('nom')->unique();
            $table->string('pavillon');
            $table->string('longeur');
            $table->string('largeur');
            $table->bigInteger('imo');
            $table->float('port_lourd');
            $table->float('tirant_eau');
            $table->float('poids')->nullable();
            $table->string('type');
            $table->timestamps();

            $table->foreign('armateur_id')->references('id')->on('armateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navires');
    }
}
