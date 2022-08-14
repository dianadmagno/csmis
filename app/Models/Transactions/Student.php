<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tr_students';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'email',
        'age',
        'address',
        'birthdate',
        'serial_number',
        'headgear',
        'bda',
        'goa_chest',
        'goa_waist',
        'shoe_size',
        'shoe_width',
        'ethnic_group',
        'gwa',
        'photo'
    ];
}
