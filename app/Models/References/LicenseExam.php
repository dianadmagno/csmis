<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenseExam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_license_exams';
    protected $fillable = [
        'name',
        'description'
    ];
}
