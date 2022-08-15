<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $table = 'rf_ranks';
    protected $fillable = [
        'name',
        'description'
    ];
}
