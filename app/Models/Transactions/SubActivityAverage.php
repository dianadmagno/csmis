<?php

namespace App\Models\Transactions;

use App\Models\References\SubActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class SubActivityAverage extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table = 'tr_sub_activity_average';
    protected $fillable = ['average', 'total', 'sub_activity_id', 'student_id'];

    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'sub_activity_id');
    }
}
