<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonAcademicGrade extends Model
{
    use HasFactory;

    protected $table = 'tr_non_academic_grades';
    protected $fillable = [
        'event_id',
        'student_id',
        'activity_id',
        'grades',
        'remarks'
    ];
}
