<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon ;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\Dining_Table;
use App\Table;
use App\Coupon;

class OrderController extends Controller
{
    

    public function confirm(Order $order)
    {
        $items=$order->items;
        $data = ['item' => $items,];

        $dining_table = Dining_Table::where('order_id',$order['id'])->first();
        $table = Table::find($dining_table['table_id']);
        $table->status="等餐中";
        $table->save();

        $coupon=array();
        $coupon= ['coupon' => $coupon,];
        if (Auth::user()->member_id != null){

            $now=Carbon::now();
            $coupon=Coupon::where('restaurant_id',$order->restaurant_id)->where('StartTime','<',$now)->where('EndTime','>',$now)->get();
            $coupon= ['coupon' => $coupon,];
        }

            return view('confirm',$data, $coupon);
    }
    public function checkout($id)
    {
        $dining_table = Dining_Table::where('order_id',$id)->first();
        $table = Table::find($dining_table['table_id']);


        if ($table['status'] == "等餐中")
        {
            return view('order_status.status1');
        } elseif($table['status'] == "用餐中" ){
            return view('order_status.status2');
        }elseif($table['status'] == "已結帳" ){
            return view('order_status.status3');
        }



    }

    public function create(Order $order,$id)
    {
        $qu='0';
        $time = Carbon::now();

        Member_coupons::create( [
            'coupon_id'=>$id,
            'member_id'=>$order['member_id'],
            'order_id'=>$order['id'],
            'status'=>$qu,
            'UseTime'=>$time,
        ]);

        return view('order_status.status3');
    }
}
