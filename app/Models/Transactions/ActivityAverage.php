<?php

namespace App\Models\Transactions;

use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class ActivityAverage extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    
    protected $table = 'tr_activity_average';
    protected $fillable = ['student_id', 'activity_id', 'average', 'total_points'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
