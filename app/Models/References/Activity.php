<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\ClassActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'rf_activities';

    protected $fillable = ['name', 'description'];

    public function classActivities()
    {
        return $this->hasMany(ClassActivity::class, 'activity_id');
    }
}
