<?php

namespace App\Models\Transactions;

use App\Models\References\Rank;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\PersonnelClass;
use App\Models\References\PersonnelCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Personnel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

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

    public function personnelCategory()
    {
        return $this->belongsTo(PersonnelCategory::class);
    }

    public function personnelClasses()
    {
        return $this->hasMany(PersonnelClass::class);
    }
}
