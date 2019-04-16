<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
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
        $items=$order->items;
        $data = ['item' => $items,];
        return view('item',$data);

    }
    public function index2(Order $order)
    {
        $items=$order->items;
        $data = ['item' => $items,];
        return view('test',$data);

    }

    public function destroy($id,$item)
    {
        Item::destroy($item);
        return redirect()->route('menu.index');
    }
    public function confirm($id)
    {
        $items = Item::where('order_id',$id)->get();
        foreach ($items as $item){
            $item->status=3;
            $item->save();
        }
        return redirect()->route('menu.index');
    }


}
