<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelType extends Model
{
    use HasFactory;

    protected $table = 'rf_personnel_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
