<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navire', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('pavillon');
            $table->string('aslireEmpl');
            $table->float('IMO');
            $table->float('loa');
            $table->float('beam');
            $table->float('DWT');
            $table->float('draft');
            $table->float('tonnage');
            $table->string('type');

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
        Schema::dropIfExists('navire');
    }
}
