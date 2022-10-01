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
        Schema::create('tr_sub_activity_average', function (Blueprint $table) {
            $table->id();
            $table->integer('average');
            $table->integer('total');
            $table->foreignId('student_id')->constrained('tr_students');
            $table->foreignId('sub_activity_id')->constrained('rf_sub_activities');
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
        Schema::dropIfExists('tr_sub_activity_average');
    }
};
