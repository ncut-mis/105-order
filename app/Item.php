<?php

namespace App;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function meal(){
        return $this->hasOne(MealEloquent::class);
    }
}
