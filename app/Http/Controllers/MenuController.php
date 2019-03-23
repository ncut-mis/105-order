<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Customer as CustomerEloquent;
use App\User as UserEloquent;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use App\Restaurant as RestaurantTypeEloquent;

class MenuController extends Controller
{

    public function index()
    {
        $restaurant= auth()->user()->restaurant;


        $meal = MealEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();



        $data=['meals'=>$meal]+['restaurant'=>$restaurant];
        return view('menu',$data);
    }

}
