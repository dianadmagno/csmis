<?php

namespace App\Models\Transactions;

use App\Models\References\Course;
use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\PersonnelClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class StudentClass extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_classes';
    protected $fillable = [
        'name',
        'alias',
        'course_id',
        'graduation_date',
        'description'
    ];

    public function personnelClasses()
    {
        return $this->hasMany(PersonnelClass::class, 'class_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function studentClasses()
    {
        return $this->hasMany(StudentClasses::class, 'class_id');
    }
}
