<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'age'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function service(){
        return $this->belongsToMany('App\Models\Service', 'freelancer-service');
    }
}
