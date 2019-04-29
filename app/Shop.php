<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';
    public $timestamps = false;
    protected $fillable = ['name','price','image','updated_at','created_at'];
}


