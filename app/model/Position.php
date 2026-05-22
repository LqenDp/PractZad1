<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $primaryKey = 'UniqueID';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'salary_base',
        'bonus_seniority',
        'bonus_hazard'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'UniqueID');
    }
}