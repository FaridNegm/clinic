<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_appointment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sat')->nullable();
            $table->string('sat_from')->nullable();
            $table->string('sat_to')->nullable();
            $table->string('sun')->nullable();
            $table->string('sun_from')->nullable();
            $table->string('sun_to')->nullable();
            $table->string('mon')->nullable();
            $table->string('mon_from')->nullable();
            $table->string('mon_to')->nullable();
            $table->string('tue')->nullable();
            $table->string('tue_from')->nullable();
            $table->string('tue_to')->nullable();
            $table->string('wen')->nullable();
            $table->string('wen_from')->nullable();
            $table->string('wen_to')->nullable();
            $table->string('thu')->nullable();
            $table->string('thu_from')->nullable();
            $table->string('thu_to')->nullable();
            $table->string('fri')->nullable();
            $table->string('fri_from')->nullable();
            $table->string('fri_to')->nullable();
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
        Schema::dropIfExists('doctor_appointment');
    }
}
