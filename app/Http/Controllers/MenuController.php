<?php
namespace App\Http\Controllers;
use App\Order;
use Auth;
class MenuController extends Controller
{
    public function index()
    {
        $restaurant= auth()->user()->restaurant;

        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;

        $order=Auth::user()->order;



        $meal = $restaurant->meals;

        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$order]+['item' => $items];
        return view('menu',$data);






    }
}