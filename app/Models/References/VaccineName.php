<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccineName extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_vaccine_names';
    protected $fillable = [
        'name',
        'description'
    ];
}
