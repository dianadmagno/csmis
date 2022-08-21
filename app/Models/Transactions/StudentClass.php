<?php

namespace App\Models\Transactions;

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
        'is_active'
    ];

    public function personnelClasses()
    {
        return $this->hasMany(PersonnelClass::class, 'class_id');
    }
}
