<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\NonAcademicGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
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
}
