<?php

namespace App\Models\Transactions;

use App\Models\References\Rank;
use App\Models\References\Unit;
use App\Models\References\Course;
use App\Models\References\Company;
use App\Models\References\Religion;
use App\Models\References\BloodType;
use App\Models\References\EthnicGroup;
use Illuminate\Database\Eloquent\Model;
use App\Models\References\EnlistmentType;
use App\Models\Transactions\StudentClass;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tr_students';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'email',
        'age',
        'address',
        'birthdate',
        'serial_number',
        'headgear',
        'bda',
        'goa_chest',
        'goa_waist',
        'shoe_size',
        'shoe_width',
        'ethnic_group_id',
        'blood_type_id',
        'religion_id',
        'rank_id',
        'enlistment_type_id',
        'gwa',
        'photo',
        'unit_id',
        'company_id',
        'civil_status',
        'sex',
        'mobile_number',
        'educational_attainment',
        'course',
        'physical_profile',
        'emergency_contact_person',
        'emergency_contact_number',
        'emergency_contact_relationship',
        'birthplace',
        'region',
        'tesda',
        'termination_remarks'
    ];

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function enlistmentType()
    {
        return $this->belongsTo(EnlistmentType::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function ethnicGroup()
    {
        return $this->belongsTo(EthnicGroup::class);
    }

    public function studentClasses()
    {
        return $this->hasMany(StudentClasses::class, 'student_id');
    }
}
