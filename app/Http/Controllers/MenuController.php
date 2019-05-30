<?php
namespace App\Http\Controllers;
use App\Order;
use App\Dining_Table;
use App\Table;
use Auth;
class MenuController extends Controller
{
    public function index()
    {
        $restaurant= auth()->user()->restaurant;

        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;


        $dining_table = Dining_Table::where('order_id',$order['id'])->first();
        $table = Table::find($dining_table['table_id']);


        $order=Auth::user()->order;



        $meal = $restaurant->meals;




        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$order]+['item' => $items]+['table'=>$table];
        return view('menu',$data);






    }

    public function ajax()
    {
        $restaurant= auth()->user()->restaurant;

        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;

        $order=Auth::user()->order;



        $meal = $restaurant->meals;

        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$order]+['item' => $items];
        return view('ajax',$data);
    }
    public function ajaxdata()
    {
        $restaurant= auth()->user()->restaurant;

        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;

        $order=Auth::user()->order;



        $meal = $restaurant->meals;

        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$order]+['item' => $items];
        return view('ajaxdata',$data);
    }
}