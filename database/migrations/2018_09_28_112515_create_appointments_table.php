<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id');
            $table->string('clinic_id');
            $table->enum('status', ['confirmed', 'to_confirm','closed_patient_treated','closed_visit_skipped','canceled']);;
            $table->string('cost');
            $table->date('date');
            $table->date('start');
            $table->date('end');
            $table->text('clerk_comment');
            $table->text('doctor_comment');
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
        Schema::dropIfExists('appointments');
    }
}
