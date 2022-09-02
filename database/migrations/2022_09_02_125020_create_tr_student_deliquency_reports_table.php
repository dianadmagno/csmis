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
        Schema::create('tr_student_deliquency_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                    ->constraints('tr_students')
                    ->onDelete('cascade');
            $table->string('dr_type');
            $table->integer('demerit_points');
            $table->string('remarks');
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
        Schema::dropIfExists('tr_student_deliquency_reports');
    }
};
