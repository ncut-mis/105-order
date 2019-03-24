<?php

namespace App\Http\Controllers;

use Auth;
use \Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Item as ItemEloquent;

class OrderItemController extends Controller
{

    public function store(Request $request,$id)
    {
        $qu='1';
        $time = Carbon::now();


        ItemEloquent::create( [
            'order_id'=>$request['order_id'],
            'meal_id'=>$id,
            'quantity'=>$request['quantity'],
            'status'=>$qu,
            'EndTime'=> $time,
        ]);
        return redirect()->route('menu.index');
    }

    public function index($id)
    {
        $items = ItemEloquent::join('meals','items.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->select('items.id','items.meal_id','meals.photo','meals.name','meals.price','items.quantity','items.status','items.updated_at','items.order_id')
            ->get();

        $data = ['item' => $items,];
        return view('item',$data);
    }
    public function destroy($id,$item)
    {
        ItemEloquent::destroy($item);
        return redirect()->route('menu.index');
    }

    public function confirm($id)
    {
        $items = ItemEloquent::where('order_id',$id)->get();
        foreach ($items as $item){
            $item->status=3;
            $item->save();
        }
        return redirect()->route('menu.index');
    }
}
