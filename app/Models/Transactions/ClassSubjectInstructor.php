<?php

namespace App\Models\Transactions;

use App\Models\References\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSubjectInstructor extends Model
{
    use HasFactory;

    protected $table = 'tr_class_subject_instructors';
    protected $fillable = [
        'class_id',
        'subject_id',
        'instructor_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
