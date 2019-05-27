<?php
namespace App\Http\Controllers;
use App\Restaurant;
use Auth;
use \Carbon\Carbon ;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\Dining_Table;
use App\Table;
use App\Coupon;
use App\Member_coupons;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class OrderController extends Controller
{


    public function confirm(Order $order)
    {
        $dining_table = Dining_Table::where('order_id',$order['id'])->first();
        $table = Table::find($dining_table['table_id']);
        $table->status="確認中";
        $table->save();

/**

        $counter = Restaurant::where('id',Auth::user()->restaurant_id)
            ->value('token');

        $token = $counter;

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder('有顧客向您發送訂單囉');
        $notificationBuilder->setBody('快讀我~我餓了!!!')
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        sleep(0.5);
        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();

**/


        return redirect()->route('confirm.index');

    }
    public function confirm2()
    { $restaurant= auth()->user()->restaurant;
        $order = Order::where('customer_id',Auth::user()->id)->first();
        $items=$order->items;
        $abc = ['item' => $items,]+['restaurant'=>$restaurant];
        $coupon=array();
        $coupon= ['coupon' => $coupon,];
        if (Auth::user()->member_id != null){

            $coupon =Member_coupons::join('coupons','member_coupons.coupon_id','=','coupons.id')
                ->where('member_id',Auth::user()->member_id)
                ->where('restaurant_id',Auth::user()->restaurant_id)
                ->select('coupons.content','coupons.EndTime','coupons.title','coupons.photo','member_coupons.coupon_id','member_coupons.id','member_coupons.UseTime','member_coupons.status')
                ->get();
            $coupon= ['coupon' => $coupon,];
        }


        return view('confirm',$abc, $coupon);


    }
    public function checkout($id)
    {
        $dining_table = Dining_Table::where('order_id',$id)->first();
        $table = Table::find($dining_table['table_id']);

        $order =Order::find($id);

        if ($table['status'] == "確認中")
        {

            return view('order_status.status0');

        }elseif( $order['status'] == "出餐中" ){
            return view('order_status.status1');
        } elseif($order['status'] == "未結帳" ){
            return view('order_status.status2');
        } elseif($order['status'] == "已結帳" ){
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
