<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $table = 'discount_program';
    protected $guarded = [];
    public $timestamps = true;
}
