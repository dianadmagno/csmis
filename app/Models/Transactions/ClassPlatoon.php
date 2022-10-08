<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassPlatoon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_class_platoons';

    protected $fillable = [
        'name',
        'description',
        'class_id'
    ];
}
