<?php

namespace App\Http\Controllers;
use Auth;


class MenuController extends Controller
{

    public function index()
    {
        $restaurant= auth()->user()->restaurant;
        $orders=Auth::user()->order;

        $meal = $restaurant->meal;



        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$orders];
        return view('menu',$data);
    }

}
