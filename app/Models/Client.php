<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'phone'];
    public $timestamps = false;

    public function freelancer()
    {
        return $this->hasOneThrough('App\Models\Freelancer', 'App\Models\Offer');
    }
}
