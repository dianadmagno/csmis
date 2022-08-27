<?php

namespace App\Models\Transactions;

use App\Models\References\Subject;
use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentGrade extends Model
{
    use HasFactory;

    protected $table = 'tr_student_grades';

    protected $fillable = [
        'student_id',
        'subject_id',
        'grade'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
