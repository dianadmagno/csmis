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
        Schema::create('tr_student_class_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('tr_students');
            $table->foreignId('class_id')->constrained('tr_classes');
            $table->foreignId('subject_id')->constrained('rf_subjects');
            $table->integer('average');
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
        Schema::dropIfExists('tr_student_class_subjects');
    }
};
