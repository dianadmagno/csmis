<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Company extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'rf_companies';
    protected $fillable = [
        'name',
        'description'
    ];
}
