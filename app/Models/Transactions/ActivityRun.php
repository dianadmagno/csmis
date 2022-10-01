<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\ClassActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityRun extends Model
{
    use HasFactory;

    protected $table = 'tr_activity_runs';
    protected $fillable = ['class_activity_id', 'group', 'time'];

    public function classActivity()
    {
        return $this->belongsTo(ClassActivity::class);
    }
}
