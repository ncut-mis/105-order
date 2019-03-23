<?php

namespace App;
use \App\User as UserEloquent;
use \App\Order as OrderEloquent;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';


    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }
    public function order(){
        return $this->hasMany(OrderEloquent::class);
    }
    public function Restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}