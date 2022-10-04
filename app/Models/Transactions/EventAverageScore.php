<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\References\ActivityEvent;
use App\Models\References\SubActivityEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventAverageScore extends Model
{
    use HasFactory;

    protected $table = 'tr_event_average_scores';
    protected $fillable = ['student_id', 'activity_event_id', 'average', 'score', 'repetition_time', 'sub_activity_event_id'];

    public function subActivityEvent()
    {
        return $this->belongsTo(SubActivityEvent::class, 'sub_activity_event_id');
    }

    public function activityEvent()
    {
        return $this->belongsTo(ActivityEvent::class, 'activity_event_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
