<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSquad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_class_squads';
    protected $fillable = [
        'name',
        'description',
        'platoon_id'
    ];
}
