<?php

namespace App\Models\References;

use App\Models\References\Activity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\NonAcademicGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rf_events';
    protected $fillable = [
        'name',
        'description',
        'activity_id'
    ];

    public function nonAcademicGrades()
    {
        return $this->hasMany(NonAcademicGrade::class, 'event_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
