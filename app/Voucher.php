<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $guarded = [];
    public $timestamps = true;

    public function voucherUser()
    {
        return $this->hasMany('App\VoucherUser', 'voucher_id', 'id');
    }
}
