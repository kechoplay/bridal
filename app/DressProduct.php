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
}
