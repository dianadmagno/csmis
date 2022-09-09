<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_subjects';
    protected $fillable = [
        'name',
        'description',
        'sub_module_id',
        'nr_of_points',
        'nr_of_pds',
        'nr_of_items'
    ];
}
