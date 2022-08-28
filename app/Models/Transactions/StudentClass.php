<?php

namespace App\Models\Transactions;

use App\Models\References\Course;
use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\PersonnelClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'tr_classes';
    protected $fillable = [
        'name',
        'alias',
        'course_id',
        'graduation_date'
    ];

    public function personnelClasses()
    {
        return $this->hasMany(PersonnelClass::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
