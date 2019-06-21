<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon as Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\Dining_Table;
use App\Table;
class OrderItemController extends Controller
{
    public function store(Request $request,$id)
    {

        $qu='1';
        $time = Carbon::now();

        Item::create( [
            'order_id'=>$id,
            'meal_id'=>$request['meal_id'],
            'quantity'=>$request['quantity'],
            'status'=>$qu,
            'EndTime'=> $time,
        ]);
        return redirect()->route('menu.index');
    }
    public function index(Order $order)
    {
        $restaurant= auth()->user()->restaurant;


        $items=$order->items;




        $meal = $restaurant->meals;

        $data=['meals'=>$meal]+['restaurant'=>$restaurant]+['orders'=>$order]+['item' => $items];
        return view('ajaxdata',$data);
    }
    public function index2(Order $order)
    {
        $items = Item::join('meals','items.meal_id','=','meals.id')
        ->where('order_id',$order['id'])
        ->select('items.id','items.meal_id','meals.photo','meals.name','meals.price','items.quantity','items.status','items.updated_at','items.order_id')
        ->get();



        return array(['item' => $items]);

    }


    public function destroy($id,$item)
    {
        Item::destroy($item);
        return redirect()->route('menu.index');
    }


}
