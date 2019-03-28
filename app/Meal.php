<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use \App\Item as ItemEloquent;
use \App\MealKeyword as MealKeywordEloquent;
use \App\Category as CategoryEloquent;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function items(){
        return $this->hasMany(ItemEloquent::class);
    }
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function MealKeyword(){
        return $this->hasMany(MealKeywordEloquent::class);
    }
    public function category(){
        return $this->belongsTo(CategoryEloquent::class);
    }
}
