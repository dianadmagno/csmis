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
        Schema::create('tr_activity_runs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('rf_activities');
            $table->foreignId('class_id')->constrained('tr_classes');
            $table->string('group')->nullable();
            $table->string('time');
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
        Schema::dropIfExists('tr_activity_runs');
    }
};
