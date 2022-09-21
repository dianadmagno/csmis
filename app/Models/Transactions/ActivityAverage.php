<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityAverage extends Model
{
    use HasFactory;
    
    protected $table = 'tr_activity_average';
    protected $fillable = ['student_id', 'activity_id', 'average'];
}
