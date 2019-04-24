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


        $dining_table = Dining_Table::where('order_id',$order['id'])->first();
        $table = Table::find($dining_table['table_id']);
        $table->status="等餐中";
        $table->save();


            return view('confirm');
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
