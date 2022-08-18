<?php

namespace App\Models\Transactions;

use App\Models\References\Rank;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\PersonnelClass;
use App\Models\References\PersonnelCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'tr_personnels';

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'serial_number',
        'rank_id',
        'personnel_category_id',
        'photo'
    ];
    
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function personnelCategories()
    {
        return $this->belongsTo(PersonnelCategory::class);
    }
}
