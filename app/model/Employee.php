<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;
use Model\Accrual;
use Model\Position;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'UniqueID';
    public $timestamps = true;

    protected $fillable = [
        'tab_number',
        'surname',
        'name',
        'inn',
        'snils',
        'banc_account',
        'departament',
        'position_id'
    ];

    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name;
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'UniqueID');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id', 'UniqueID');
    }

    public function accruals()
    {
        return $this->hasMany(Accrual::class, 'employee_id', 'UniqueID');
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class, 'employee_id', 'UniqueID');
    }
}