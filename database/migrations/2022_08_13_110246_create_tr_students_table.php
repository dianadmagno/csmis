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
        Schema::create('tr_students', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('email');
            $table->string('serial_number')->nullable();
            $table->string('age');
            $table->date('birthdate');
            $table->string('address');
            $table->string('headgear');
            $table->string('bda');
            $table->string('goa_chest');
            $table->string('goa_waist');
            $table->string('shoe_size');
            $table->string('shoe_width');
            $table->string('ethnic_group');
            $table->string('photo')->nullable();
            $table->string('gwa')->nullable();
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
        Schema::dropIfExists('tr_students');
    }
};
