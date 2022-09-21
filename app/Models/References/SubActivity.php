<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    use HasFactory;

    protected $table = 'rf_sub_activities';
    protected $fillable = ['name', 'description', 'percentage', 'activity_id'];
}
