<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Staff extends Model
{
    use Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
