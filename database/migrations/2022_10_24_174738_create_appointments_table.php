<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            //$table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('clinical_service_id');
            $table->string('description');
            $table->date('appointment_date');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            //$table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('clinical_service_id')->references('id')->on('clinical_services');
            $table->softDeletes();
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
};
