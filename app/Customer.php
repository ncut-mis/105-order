<?php

namespace App;
use \App\Member as MemberEloquent;
use \App\Order as OrderEloquent;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';

    public function member(){
        return $this->belongsTo(MemberEloquent::class);
    }
    public function order(){
        return $this->hasMany(OrderEloquent::class);
    }
    public function Restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }

}