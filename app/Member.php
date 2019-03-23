<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use Notifiable;
    protected $table = 'members';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer(){
        return $this->hasMany(CustomerEloquent::class);
    }
    public function CouponsStatus(){
        return $this->hasMany(CouponsStatusEloquent::class);
    }
}

