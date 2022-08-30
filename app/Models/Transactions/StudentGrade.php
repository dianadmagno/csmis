<?php

namespace App\Models\Transactions;

use App\Models\References\Subject;
use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\ClassSubjectInstructor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentGrade extends Model
{
    use HasFactory;

    protected $table = 'tr_student_grades';

    protected $fillable = [
        'student_id',
        'subject_id',
        'grade',
        'allocated_points'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classSubjectInstructor()
    {
        return $this->hasOne(ClassSubjectInstructor::class, 'subject_id', 'subject_id');
    }
}
