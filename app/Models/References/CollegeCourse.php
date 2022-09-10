<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_college_courses';
    
    protected $fillable = [
        'name',
        'description'
    ];
}
