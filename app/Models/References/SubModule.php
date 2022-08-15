<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    use HasFactory;

    protected $table = 'rf_sub_modules';
    protected $fillable = [
        'name',
        'description',
        'module_id'
    ];
}
