<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DressProduct extends Model
{
    //
    protected $table = 'dress_product';
    public $timestamps = true;
    protected $guarded = [];

    public function weddingDressCategory()
    {
        return $this->belongsTo('App\WeddingDressCategory');
    }

    public function styleDress()
    {
        return $this->belongsTo('App\StyleDress');
    }

    public function colorDress()
    {
        return $this->hasOne('App\Colors', 'id', 'color1');
    }

    public function colorFlower()
    {
        return $this->hasOne('App\Colors', 'id', 'color2');
    }

    public function sizes()
    {
        return $this->hasOne('App\Sizes', 'id', 'size');
    }

    public function Cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
