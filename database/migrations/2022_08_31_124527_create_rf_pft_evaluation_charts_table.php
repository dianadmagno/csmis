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
        Schema::create('rf_pft_evaluation_charts', function (Blueprint $table) {
            $table->id();
            $table->string('age_group_from');
            $table->string('age_group_to');
            $table->string('repetition');
            $table->boolean('sex');
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
        Schema::dropIfExists('rf_pft_evaluation_charts');
    }
};
