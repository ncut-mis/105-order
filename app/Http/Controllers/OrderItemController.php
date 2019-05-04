<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon as Carbon;
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
        $items=$order->items;
        $data = ['item' => $items,];
        return view('item',$data);

    }
    public function index2(Order $order)
    {
        $items=$order->items;
        $data = ['item' => $items,];
        return $data;
    }


    public function destroy($id,$item)
    {
        Item::destroy($item);
        return redirect()->route('menu.index');
    }
    public function confirm1($id)
    {
        $items = Item::where('order_id',$id)->get();
        foreach ($items as $item){
            $item->status=3;
            $item->save();
        }
        return redirect()->route('menu.index');
    }

    public function confirm($id)
    {
        $dining_table = Dining_Table::where('order_id',$id)->first();
        $table = Table::find($dining_table['table_id']);
        $table->status="等餐中";
        $table->save();
        return redirect()->route('menu.index');
    }
}
