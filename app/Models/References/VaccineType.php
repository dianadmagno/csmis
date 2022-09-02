<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineType extends Model
{
    use HasFactory;

    protected $table = 'rf_vaccine_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
