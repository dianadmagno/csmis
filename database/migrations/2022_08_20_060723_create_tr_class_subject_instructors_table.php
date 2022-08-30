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
        Schema::create('tr_class_subject_instructors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')
                ->constraints('tr_classes')
                ->onDelete('cascade');
            $table->foreignId('subject_id')
                ->constraints('rf_subjects')
                ->onDelete('cascade');
            $table->foreignId('module_id')
                ->constaraints('rf_modules')
                ->onDelete('cascade');
            $table->integer('instructor_id')->nullable();
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
        Schema::dropIfExists('tr_class_subject_instructors');
    }
};
