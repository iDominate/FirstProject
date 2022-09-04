<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    protected $fillable = ['id', 'name', 'address'];
    protected $hidden = ['laravel_through_key'];
    public $timestamps = false;


    public function student()
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Teacher');
    }
}
