<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    use HasFactory;

    protected $table = 'tr_student_grades';

    protected $fillable = [
        'student_id',
        'subject_id',
        'average'
    ];
}
