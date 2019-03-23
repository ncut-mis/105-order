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
        $orders=OrderEloquent::where('customer_id',Auth::user()->id)->get();

        $meal = MealEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();



        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$orders];
        return view('menu',$data);
    }

}
