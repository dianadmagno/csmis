<?php

namespace App\Models\References;

use App\Models\References\SubActivity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\ClassActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_activities';

    protected $fillable = ['name', 'description', 'percentage', 'nr_of_points', 'parent_id', 'has_sub_activities'];

    public function classActivities()
    {
        return $this->hasMany(ClassActivity::class, 'activity_id');
    }

    public function subActivities()
    {
        return $this->hasMany(SubActivity::class, 'activity_id');
    }
}
