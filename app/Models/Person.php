<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'age','registered'];
    protected $table = 'persons';

    public $timestamps = false;

    //accessor
    public function getRegisteredAttribute($val)
    {
        return $val == 1 ? 'active': 'inactive';
    }

    //Mutator
    public function setNameAttribute($val)
    {
        return $this->attributes['name'] = strtoupper($val);
    }
}
