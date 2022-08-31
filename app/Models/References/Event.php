<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'rf_events';
    protected $fillable = [
        'name',
        'description',
        'activity_id'
    ];
}
