<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'contact_info';
    protected $guarded = [];
    public $timestamps = true;
}
