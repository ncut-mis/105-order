<?php

namespace App;
use \App\Member as MemberEloquent;
use \App\Order as OrderEloquent;
use \App\Coupon as CouponEloquent;
use Illuminate\Database\Eloquent\Model;

class Member_coupons extends Model
{

    protected $fillable = [
        'coupon_id',
        'member_id',
        'order_id',
        'status',
        'UseTime'

    ];
    public function  member(){
        return $this->belongsTo( MemberEloquent::class);
    }
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function coupon(){
        return $this->hasOne(CouponEloquent::class);
    }
}
