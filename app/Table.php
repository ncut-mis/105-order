<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\OrderTable as OrderTableEloquent;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function OrderTable(){
        return $this->belongsTo(OrderTableEloquent::class);
    }
}
