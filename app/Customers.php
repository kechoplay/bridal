<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customers extends Authenticatable
{
    protected $table = 'customers';
    protected $guarded = [];
    public $timestamps = true;
}
