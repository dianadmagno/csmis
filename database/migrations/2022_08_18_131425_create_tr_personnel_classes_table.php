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
        Schema::create('tr_personnel_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained('tr_personnels');
            $table->foreignId('class_id')->constrained('tr_classes');
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
        Schema::dropIfExists('tr_personnel_classes');
    }
};
