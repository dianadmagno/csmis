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
        Schema::create('tr_non_academic_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')
                ->nullable()
                ->constrained('rf_events')
                ->onDelete('cascade');
            $table->foreignId('activity_id')
                ->nullable()
                ->constrained('rf_activities')
                ->onDelete('cascade');
            $table->foreignId('student_id')
                ->constrained('tr_students')
                ->onDelete('cascade');
            $table->integer('average');
            $table->softDeletes();
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
        Schema::dropIfExists('tr_non_academic_grades');
    }
};
