<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'rf_ranks';
    protected $fillable = [
        'name',
        'description'
    ];
}
