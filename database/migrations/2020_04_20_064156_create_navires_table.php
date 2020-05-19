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
            $table->string('nom');
            $table->string('pavillon');
           // $table->string('aslireEmpl');
            $table->float('imo');
            $table->float('loa');
            $table->float('beam');
            $table->float('dwt');
            $table->float('draft');
           // $table->float('tonnage');
            $table->string('type');
//            $table->integer('annonceNav_id')->unsigned();
//            $table->foreign('annonceNav_id')->references('id')->on('annonce_navs');

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
        Schema::dropIfExists('navires');
    }
}
