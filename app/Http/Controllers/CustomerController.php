<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Customer ;
use App\User ;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use App\Restaurant as RestaurantTypeEloquent;




class CustomerController extends Controller
{

    public function index($customer)
    {
        Auth::loginUsingId($customer);


        return redirect()->route('menu.index');
    }

}
