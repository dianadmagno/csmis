<?php

namespace App\Models\References;

use App\Models\References\Activity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\SubActivityAverage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubActivity extends Model
{
    use HasFactory;

    protected $table = 'rf_sub_activities';
    protected $fillable = ['name', 'description', 'percentage', 'activity_id'];

    public function subActivityAverage()
    {
        return $this->hasOne(SubActivityAverage::class, 'sub_activity_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
