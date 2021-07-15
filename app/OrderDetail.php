<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_detail';
    protected $guarded = [];
    public $timestamps = true;

    public function order()
    {
        return $this->hasOne('App\Orders', 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasOne('App\DressProduct', 'id', 'dress_id');
    }
}
