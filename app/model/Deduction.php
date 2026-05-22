<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;
use Model\DeductionType;

class Deduction extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'deduction_type_id',
        'amount',
        'month'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'UniqueID');
    }

    public function type()
    {
        return $this->belongsTo(DeductionType::class, 'deduction_type_id');
    }
}