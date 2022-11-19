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
        Schema::create('specialists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinical_service_id')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('first_name', 20);
            $table->string('second_name', 20)->nullable();
            $table->string('first_surname', 20);
            $table->string('second_surname', 20)->nullable();
            $table->string('identification_number', 15)->unique();
            $table->date('birthday_date');
            $table->string('email', 50)->nullable();
            $table->char('address', 100)->nullable();
            $table->timestamps();
            $table->foreign('clinical_service_id')->references('id')->on('clinical_services')->onDelete('set null');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialists');
    }
};
