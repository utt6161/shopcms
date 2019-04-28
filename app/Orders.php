<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = ['product_id','product_name',
                           'price','quantity'
                          ,'name','email','phone',
                           'updated_at','created_at'];
}
