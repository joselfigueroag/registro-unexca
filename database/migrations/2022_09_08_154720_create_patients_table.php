<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('civil_status_id')->nullable();
            $table->string('first_name', 20);
            $table->string('second_name', 20)->nullable();
            $table->string('first_surname', 20);
            $table->string('second_surname', 20)->nullable();
            $table->date('birthday_date');
            $table->string('identification_number', 15)->nullable();
            $table->string('clinic_history', 15)->unique();
            $table->timestamps();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
            $table->foreign('civil_status_id')->references('id')->on('civil_status')->onDelete('set null');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("DROP TABLE if exists patients cascade");
    }
};
