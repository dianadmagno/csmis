<?php

namespace App\Models\Transactions;

use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\PersonnelClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'tr_classes';
    protected $fillable = [
        'name',
        'description',
        'alias',
        'is_active',
        'graduation_date'
    ];

    public function personnelClasses()
    {
        return $this->hasMany(PersonnelClass::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
