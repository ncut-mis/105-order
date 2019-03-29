<?php

namespace App;
use \App\Staff as StaffEloquent;
use \App\Post as PostEloquent;
use \App\Coupon as CouponEloquent;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use \App\Table as TableEloquent;
use \App\Customer as CustomerEloquent;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function staff(){
        return $this->hasMany(StaffEloquent::class);
    }
    public function posts(){
        return $this->hasMany(PostEloquent::class);
    }
    public function coupons(){
        return $this->hasMany(CouponEloquent::class);
    }
    public function meals(){
        return $this->hasMany(MealEloquent::class);
    }
    public function orders(){
        return $this->hasMany(OrderEloquent::class);
    }
    public function tables(){
        return $this->hasMany(TableEloquent::class);
    }
    public function customers(){
        return $this->hasMany(CustomerEloquent::class);
    }

}
