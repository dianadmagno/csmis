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
        Schema::create('tr_schedules', function (Blueprint $table) {
            $table->id();
            $table->datetime('from');
            $table->datetime('to');
            $table->foreignId('class_id')->constrained('tr_classes')->nullable();
            $table->foreignId('subject_id')->constrained('rf_subjects')->nullable();
            $table->foreignId('activity_id')->constrained('rf_activities')->nullable();
            $table->foreignId('personnel_id')->constrained('tr_personnels')->nullable();
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
        Schema::dropIfExists('tr_schedules');
    }
};
