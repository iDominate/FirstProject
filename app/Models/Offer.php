<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;


    protected $fillable=['id', 'name', 'client_id'];
    public $timestamps = false;


    public function Client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
