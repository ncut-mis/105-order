<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use \App\Customer as CustomerEloquent;
use \App\Restaurant as RestaurantEloquent;
use \App\Item as ItemEloquent;
use \App\Member_coupons as Member_couponsEloquent;
use \App\OrderTable as OrderTableEloquent;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{

    use Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'restaurant_id',
        'customer_id',
        'people',
        'time',
        'total',
        'PayType'
    ];

    public function customer(){
        return $this->belongsTo(CustomerEloquent::class);
    }
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function items(){
        return $this->hasMany(ItemEloquent::class);
    }
    public function member_coupons(){
        return $this->hasone(Member_couponsEloquent::class);
    }
    public function OrderTables(){
        return $this->hasmany(OrderTableEloquent::class);
    }
}
