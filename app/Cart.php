<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];
    public $timestamps = true;

    public function dressProsuct()
    {
        return $this->hasMany('App\DressProduct', 'product_id', 'id');
    }
}
