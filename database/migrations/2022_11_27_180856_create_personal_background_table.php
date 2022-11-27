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
        Schema::create('personal_background', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->boolean('diabetes_p')->default(false);
            $table->boolean('hypertension_p')->default(false);
            $table->boolean('hiv_p')->default(false);
            $table->boolean('allergies_p')->default(false);
            $table->boolean('carcinomas_p')->default(false);
            $table->boolean('surgeries_p')->default(false);
            $table->boolean('heart_disease_p')->default(false);
            $table->boolean('liver_disease_p')->default(false);
            $table->boolean('nephropathy_p')->default(false);
            $table->boolean('psychological_p')->default(false);
            $table->boolean('neurological_p')->default(false);
            $table->boolean('endocrine_p')->default(false);
            $table->boolean('hematological_p')->default(false);
            $table->boolean('autoimmune_p')->default(false);
            $table->boolean('respiratory_p')->default(false);
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
        Schema::dropIfExists('personal_background');
    }
};
