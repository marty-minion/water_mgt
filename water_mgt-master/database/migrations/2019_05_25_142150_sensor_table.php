<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sensorsTable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sensor_id');
            $table->integer('longitude');
            $table->integer('latitude');
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
        //
        Schema::dropIfExists('sensorsTable');
    }
}
