<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRun extends Model
{
    use HasFactory;

    protected $table = 'tr_activity_runs';
    protected $fillable = ['class_id', 'activity_id', 'group', 'time'];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
