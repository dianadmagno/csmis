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
        Schema::create('tr_event_average_scores', function (Blueprint $table) {
            $table->id();
            $table->string('repetition_time');
            $table->integer('score');
            $table->integer('average')->nullable();
            $table->foreignId('student_id')->constrained('tr_students');
            $table->foreignId('activity_event_id')->nullable()->constrained('rf_activity_events');
            $table->foreignId('sub_activity_event_id')->nullable()->constrained('rf_sub_activity_events');
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
        Schema::dropIfExists('event_average_scores');
    }
};
