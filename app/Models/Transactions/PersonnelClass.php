<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\StudentClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonnelClass extends Model
{
    use HasFactory;

    protected $table = 'tr_personnel_classes';

    protected $fillable = ['personnel_id', 'class_id'];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
