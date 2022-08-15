<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;

    protected $table = 'rf_blood_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
