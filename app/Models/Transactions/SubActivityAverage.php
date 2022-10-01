<?php

namespace App\Models\Transactions;

use App\Models\References\SubActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubActivityAverage extends Model
{
    use HasFactory;

    protected $table = 'tr_sub_activity_average';
    protected $fillable = ['average', 'total', 'sub_activity_id', 'student_id'];

    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'sub_activity_id');
    }
}
