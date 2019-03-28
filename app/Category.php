<?php

namespace App;
use App\Meal as MealEloquent;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function meals(){
        return $this->hasMany(MealEloquent::class);
    }
}
