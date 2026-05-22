<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class Accrual extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'accrual_type_id',
        'amount',
        'month'
    ];

    protected $casts = [
        'month' => 'date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'UniqueID');
    }

    public function type()
    {
        return $this->belongsTo(AccrualType::class, 'accrual_type_id');
    }
}