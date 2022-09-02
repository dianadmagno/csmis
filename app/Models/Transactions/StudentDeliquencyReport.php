<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDeliquencyReport extends Model
{
    use HasFactory;

    protected $table = 'tr_student_deliquency_reports';
    protected $fillable = [
        'dr_type',
        'demerit_points',
        'remarks'
    ];
}
