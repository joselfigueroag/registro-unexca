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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->char('primary_address', 100);
            $table->char('secondary_address', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('cellphone_number', 15)->nullable();
            $table->string('local_number', 15)->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_info');
    }
};
