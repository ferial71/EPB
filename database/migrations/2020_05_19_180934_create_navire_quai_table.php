<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavireQuaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navire_quai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('navire_id')->unsignedBigInteger();
            $table->bigInteger('quai_id')->unsignedBigInteger();

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
        Schema::dropIfExists('navire_quai');
    }
}
