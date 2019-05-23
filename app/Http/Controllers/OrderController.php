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
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class OrderController extends Controller
{


    public function confirm(Order $order,Item $item)
    { $restaurant= auth()->user()->restaurant;

        $items=$order->items;
        $abc = ['item' => $items,]+['restaurant'=>$restaurant];

        $dining_table = Dining_Table::where('order_id',$order['id'])->first();
        $table = Table::find($dining_table['table_id']);
        $table->status="確認中";
        $table->save();

        $coupon=array();
        $coupon= ['coupon' => $coupon,];
        if (Auth::user()->member_id != null){

            $now=Carbon::now();
            $coupon=Coupon::where('restaurant_id',$order->restaurant_id)->where('StartTime','<',$now)->where('EndTime','>',$now)->get();
            $coupon= ['coupon' => $coupon,];
        }
        /*FCM*/
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

            return view('confirm',$abc, $coupon);
    }
    public function checkout($id)
    {
        $dining_table = Dining_Table::where('order_id',$id)->first();
        $table = Table::find($dining_table['table_id']);


        if ($table['status'] == "確認中")
        {

            return view('order_status.status0');

        }elseif($table['status'] == "等餐中" ){
            return view('order_status.status1');
        } elseif($table['status'] == "空閒中" ){
            return view('order_status.status2');
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
