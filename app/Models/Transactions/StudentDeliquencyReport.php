<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDeliquencyReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_student_deliquency_reports';
    protected $fillable = [
        'student_id',
        'dr_type',
        'demerit_points',
        'remarks'
    ];
}
