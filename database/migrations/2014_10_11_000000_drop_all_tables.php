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
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_info');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('civil_status');
        Schema::dropIfExists('parishes');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('capitals');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
};
