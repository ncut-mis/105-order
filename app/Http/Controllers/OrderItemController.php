<?php

namespace App\Http\Controllers;

use Auth;
use \Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Customer as CustomerEloquent;
use App\User as UserEloquent;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use App\Restaurant as RestaurantTypeEloquent;

class OrderItemController extends Controller
{

    public function store(Request $request,$id)
    {
        $qu='1';
        $time = Carbon::now();


        DetailEloquent::create( [
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
        $detail = DetailEloquent::join('meals','details.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->select('details.id','details.meal_id','meals.photo','meals.name','meals.price','details.quantity','details.status','details.updated_at','details.order_id')
            ->get();

        $data = ['detail' => $detail,];
        return view('item',$data);
    }
    public function destroy($id,$item)
    {
        DetailEloquent::destroy($item);
        return redirect()->route('menu.index');
    }
}
