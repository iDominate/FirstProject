<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function freelancer(){
        return $this->belongsToMany('App\Models\Freelancer', 'freelancer-service');
    }
}
