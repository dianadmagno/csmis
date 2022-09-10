<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiscenseExam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_liscense_exams';
    protected $fillable = [
        'name',
        'description'
    ];
}
