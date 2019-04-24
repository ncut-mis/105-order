<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\Dining_Table as Dining_TableEloquent;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

    protected $fillable = [
        'restaurant_id',
        'table',
        'status',
        'row',
        'col',
    ];
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function Dining_Table(){
        return $this->belongsTo(Dining_TableEloquent::class);
    }
}
