<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $guarded = [];
    public $timestamps = true;

    public function shippingMethod()
    {
        return $this->hasOne('App\ShippingMethod', 'id', 'shipping_method');
    }
}
