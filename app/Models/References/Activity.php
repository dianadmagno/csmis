<?php

namespace App\Models\References;

use App\Models\References\SubActivity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\ClassActivity;
use App\Models\Transactions\ActivityAverage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_activities';

    protected $fillable = ['name', 'description', 'nr_of_points', 'has_sub_activities', 'performance_type'];

    public function classActivities()
    {
        return $this->hasMany(ClassActivity::class, 'activity_id');
    }

    public function subActivities()
    {
        return $this->hasMany(SubActivity::class, 'activity_id');
    }

    public function activityAverage()
    {
        return $this->hasOne(ActivityAverage::class);
    }
}
