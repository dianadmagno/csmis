<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    use HasFactory;

    protected $table = 'rf_ethnic_groups';
    protected $fillable = [
        'name',
        'description'
    ];
}
