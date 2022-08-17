<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemeritReportType extends Model
{
    use HasFactory;

    protected $table = 'rf_demerit_report_types';
    protected $fillable = [
        'name',
        'description'
    ];
}
