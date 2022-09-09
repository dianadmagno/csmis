<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EthnicGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_ethnic_groups';
    protected $fillable = [
        'name',
        'description'
    ];
}
