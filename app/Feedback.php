<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    public $timestamps = true;
    protected $guarded = [];

    public function product() {
        return $this->hasOne('App\DressProduct', 'id', 'product_id');
    }
}
