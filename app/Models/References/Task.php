<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'rf_tasks';
    protected $fillable = [
        'name',
        'description',
        'activity_id'
    ];
}
