<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient');
            $table->string('doctor');
            $table->string('date');
            $table->text('notes')->nullable();
            $table->string('appointment_status');
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
        Schema::dropIfExists('reserve_appointments');
    }
}
