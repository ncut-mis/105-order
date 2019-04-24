<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon ;
use Illuminate\Http\Request;
use App\Member_coupons;
use App\Order;


class MemberCouponController extends Controller
{

    public function create(Order $order,$id)
    {
        $qu='0';
        $time = Carbon::now();

        Member_coupons::create( [
            'coupon_id'=>$id,
            'member_id'=>Auth::user()->member_id,
            'order_id'=>$order['id'],
            'status'=>$qu,
            'UseTime'=>$time,
        ]);

        return view('order_status.status3');
}



}
