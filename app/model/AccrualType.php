<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class AccrualType extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}