<?php

namespace App\Models\Transactions;

use App\Models\References\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentCourse extends Model
{
    use HasFactory;

    protected $table = 'tr_student_courses';
    protected $fillable = ['student_id', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
