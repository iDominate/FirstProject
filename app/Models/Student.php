<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\StudentScope;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'age', 'teacher_id'];
    protected $hidden = ['laravel_through_key'];

    public $timestamps = false;

    public function scopeIsLessThan25($query)
    {
        return $query->where('age', '<', 25);
    }

    protected static function booted()
    {
        static::addGlobalScope(new StudentScope);
    }
}
