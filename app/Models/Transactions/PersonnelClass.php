<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelClass extends Model
{
    use HasFactory;

    protected $table = 'tr_personnel_classes';

    protected $fillable = ['personnel_id', 'class_id'];
}
