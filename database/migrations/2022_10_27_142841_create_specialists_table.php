<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('first_name', 20);
            $table->string('second_name', 20)->nullable();
            $table->string('first_surname', 20);
            $table->string('second_surname', 20)->nullable();
            $table->string('identification_number', 8)->unique();
            $table->date('birthday_date');
            $table->enum('gender', ['M', 'F']);
            $table->string('email', 20)->nullable();
            $table->unsignedBigInteger('department');
            $table->foreign('department')->references('id')->on('departments');
            $table->unsignedBigInteger('clinical_service');
            $table->foreign('clinical_service')->references('id')->on('clinical_services');
            $table->char('address', 100)->nullable();
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
        Schema::dropIfExists('specialists');
    }
};
