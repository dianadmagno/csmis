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
            $table->string('emergency_contact_person');
            $table->string('emergency_contact_number');
            $table->string('emergency_contact_relationship');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('region');
            $table->string('tesda');
            $table->string('address');
            $table->string('headgear');
            $table->string('bda');
            $table->string('goa_chest');
            $table->string('goa_waist');
            $table->string('shoe_size');
            $table->string('shoe_width');
            $table->string('termination_remarks')->nullable();
            $table->integer('civil_status');
            $table->integer('sex');
            $table->string('mobile_number');
            $table->integer('educational_attainment');
            $table->string('course')->nullable();
            $table->integer('physical_profile');
            $table->foreignId('ethnic_group_id')->constrained('rf_ethnic_groups');
            $table->foreignId('unit_id')->constrained('rf_units');
            $table->foreignId('rank_id')->constrained('rf_ranks');
            $table->foreignId('enlistment_type_id')->constrained('rf_enlistment_types');
            $table->foreignId('blood_type_id')->constrained('rf_blood_types');
            $table->foreignId('religion_id')->constrained('rf_religions');
            $table->foreignId('company_id')->constrained('rf_companies');
            $table->foreignId('region_id')->constrained('rf_regions');
            $table->foreignId('island_group_id')->constrained('rf_island_groups');
            $table->foreignId('course_id')->constrained('rf_college_courses');
            $table->integer('license_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('gwa')->nullable();
            $table->integer('philhealth')->nullable();
            $table->integer('tin')->nullable();
            $table->integer('pagibig')->nullable();
            $table->integer('gsis')->nullable();
            $table->string('skills')->nullable();
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
