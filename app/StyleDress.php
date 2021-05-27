<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StyleDress extends Model
{
    //
    protected $table = 'style_dress';
    protected $guarded = [];
    public $timestamps = true;

    public function dressProduct()
    {
        return $this->hasMany('App\DressProduct', 'style', 'id');
    }
}
