<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class BloodType extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'rf_blood_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
