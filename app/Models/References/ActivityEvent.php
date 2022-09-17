<?php

namespace App\Models\References;

use App\Models\References\Activity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\NonAcademicGrade;
use App\Models\Transactions\EventAverageScore;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityEvent extends Model
{
    use HasFactory;
    
    protected $table = 'rf_activity_events';
    protected $fillable = [
        'name',
        'description',
        'activity_id',
        'percentage'
    ];

    public function nonAcademicGrades()
    {
        return $this->hasMany(NonAcademicGrade::class, 'event_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function eventAverageScore()
    {
        return $this->hasOne(EventAverageScore::class, 'event_id');
    }
}
