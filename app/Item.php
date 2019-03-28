<?php

namespace App;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [

        'order_id',
        'meal_id',
        'quantity',
        'status',
        'EndTime',
        'created_at',
        'updated_at',
    ];
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function meal(){
        return $this->belongsTo(MealEloquent::class);
    }
}
