<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\StudentClasses;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class StudentVaccine extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tr_student_vaccines';
    protected $fillable = [
        'student_id',
        'vaccine_type_id',
        'vaccine_name_id',
        'date',
        'place',
        'remarks'
    ];

    public function studentClass()
    {
        return $this->hasOne(StudentClasses::class, 'student_id');
    }
}
