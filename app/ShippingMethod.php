<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    //
    protected $table = 'shipping_method';
    protected $guarded = [];
    public $timestamps = true;
}
