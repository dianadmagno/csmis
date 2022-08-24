<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'tr_schedules';

    protected $fillable = [
        'from',
        'to',
        'class_id',
        'subject_id',
        'activity_id',
        'personnel_id'
    ];
}
