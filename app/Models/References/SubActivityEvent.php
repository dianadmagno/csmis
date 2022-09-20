<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\EventAverageScore;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubActivityEvent extends Model
{
    use HasFactory;

    protected $table = 'rf_sub_activity_events';
    protected $fillable = ['name', 'description', 'sub_activity_id', 'percentage'];

    public function eventAverageScore()
    {
        return $this->hasOne(EventAverageScore::class, 'sub_activity_event_id');
    }
}
