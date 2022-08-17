<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelCategory extends Model
{
    use HasFactory;

    protected $table = 'rf_personnel_categories';
    protected $fillable = [
        'name',
        'description'
    ];
}
