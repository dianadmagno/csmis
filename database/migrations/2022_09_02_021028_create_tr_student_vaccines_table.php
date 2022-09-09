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
        Schema::create('tr_student_vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constraints('tr_students')
                ->onDelete('cascade');
            $table->foreignId('vaccine_type_id')
                ->constraints('rf_vaccine_types')
                ->onDelete('cascade');
            $table->foreignId('vaccine_name_id')
                ->constraints('rf_vaccine_name')
                ->onDelete('cascade');
            $table->date('date');
            $table->string('place');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('tr_student_vaccines');
    }
};
