<?php
namespace App\Http\Controllers;
use Auth;
use \Carbon\Carbon ;
use Illuminate\Http\Request;
use App\Member_coupons;
use App\Order;


class MemberCouponController extends Controller
{

    public function use($id)
    {
        $order = Order::where('customer_id',Auth::user()->id)->first();

        $restaurant= auth()->user()->restaurant;
        $data=['restaurant'=>$restaurant];
        $Member_coupons= Member_coupons::find($id);

        $Member_coupons->status=1;
        $Member_coupons->order_id=$order['id'];
        $Member_coupons->UseTime=Carbon::now();
        $Member_coupons->save();


        return view('order_status.status3',$data);
}



}
