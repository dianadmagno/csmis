<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassSubject extends Model
{
    use HasFactory;

    protected $table = 'tr_student_class_subjects';

    protected $fillable = [
        'student_id',
        'class_id',
        'subject_id',
        'average'
    ];
}
