<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpnNavireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpn_navire', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cpn_id')->unsignedBigInteger();
            $table->bigInteger('navire_id')->unsignedBigInteger();
            $table->timestamps();

            $table->foreign('cpn_id')->references('id')->on('cpns');
            $table->foreign('navire_id')->references('id')->on('navires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpn_navire');
    }
}
