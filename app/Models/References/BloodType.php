<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_blood_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
