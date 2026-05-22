<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class DeductionType extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'is_permanent'];
}