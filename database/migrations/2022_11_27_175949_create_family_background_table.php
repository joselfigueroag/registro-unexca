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
        Schema::create('family_background', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->boolean('diabetes_f')->default(false);
            $table->boolean('hypertension_f')->default(false);
            $table->boolean('allergies_f')->default(false);
            $table->boolean('asthma_f')->default(false);
            $table->boolean('epilepsy_f')->default(false);
            $table->boolean('obesity_f')->default(false);
            $table->boolean('alcoholism_f')->default(false);
            $table->boolean('carcinomas_f')->default(false);
            $table->boolean('heart_disease_f')->default(false);
            $table->boolean('liver_disease_f')->default(false);
            $table->boolean('nephropathy_f')->default(false);
            $table->boolean('psychological_f')->default(false);
            $table->boolean('neurological_f')->default(false);
            $table->boolean('endocrine_f')->default(false);
            $table->boolean('hematological_f')->default(false);
            $table->boolean('autoimmune_f')->default(false);
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
        Schema::dropIfExists('family_background');
    }
};
