<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectInstructor extends Model
{
    use HasFactory;

    protected $table = 'tr_class_subject_instructors';
    protected $fillable = [
        'class_id',
        'subject_id',
        'instructor_id'
    ];
}
