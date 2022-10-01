<?php

namespace App\Models\References;

use App\Models\Transactions\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rf_regions';
    protected $fillable = [
        'name',
        'description'
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
