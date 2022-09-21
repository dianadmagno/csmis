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
        Schema::create('tr_activity_average', function (Blueprint $table) {
            $table->id();
            $table->integer('average');
            $table->foreignId('student_id')->constrained('tr_students');
            $table->foreignId('activity_id')->constrained('rf_activities');
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
        Schema::dropIfExists('activity_average');
    }
};
