<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherUser extends Model
{
    protected $table = 'voucher_user';
    protected $guarded = [];
    public $timestamps = true;

    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}
