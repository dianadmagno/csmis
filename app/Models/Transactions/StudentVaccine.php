<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentVaccine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_student_vaccines';
    protected $fillable = [
        'student_id',
        'vaccine_type_id',
        'vaccine_name_id',
        'date',
        'place',
        'remarks'
    ];
}
