<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpnDpquaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpn_dpquai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cpn_id')->unsignedBigInteger();
            $table->bigInteger('dpquai_id')->unsignedBigInteger();
            $table->timestamps();

            $table->foreign('cpn_id')->references('id')->on('cpns');
            $table->foreign('dpquai_id')->references('id')->on('dpquais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpn_dpquai');
    }
}
