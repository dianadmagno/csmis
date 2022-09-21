<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonnelCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_personnel_categories';
    protected $fillable = [
        'name',
        'description'
    ];
}
