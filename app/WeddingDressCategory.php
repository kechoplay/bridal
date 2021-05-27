<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeddingDressCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'wedding_dress_category';
    protected $guarded = [];
    public $timestamps = true;

    public function dressProduct()
    {
        return $this->hasMany('App\DressProduct', 'category_id', 'id');
    }
}
