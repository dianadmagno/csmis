<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAverageScore extends Model
{
    use HasFactory;

    protected $table = 'tr_event_average_scores';
    protected $fillable = ['student_id', 'event_id', 'activity_id', 'average', 'score'];
}
