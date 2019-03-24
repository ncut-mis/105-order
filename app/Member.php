<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\Member_coupons as Member_couponsEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{



    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer(){
        return $this->hasMany(CustomerEloquent::class);
    }
    public function member_coupons(){
        return $this->hasMany(Member_couponsEloquent::class);
    }
}

