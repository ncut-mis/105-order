<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\Member_coupons as Member_couponsEloquent;
use Illuminate\Database\Eloquent\Model;



class Coupon extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function member_coupons(){
        return $this->belongsTo(Member_couponsEloquent::class);
    }
}
