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
    public function index()
    {

        $restaurant= auth()->user()->restaurant;
        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;


        $order=Auth::user()->order;


        $data = ['item' => $items,]+['restaurant'=>$restaurant]+['orders'=>$order];
        return view('item',$data);

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
