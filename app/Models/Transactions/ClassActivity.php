<?php

namespace App\Models\Transactions;

use App\Models\References\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassActivity extends Model
{
    use HasFactory;

    protected $table = 'tr_class_activities';
    protected $fillable = ['class_id', 'activity_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
