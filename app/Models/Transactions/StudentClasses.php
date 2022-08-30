<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClasses extends Model
{
    use HasFactory;

    protected $table = 'tr_student_classes';
    protected $fillable = ['student_id', 'class_id'];

    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
