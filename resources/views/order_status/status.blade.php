

  @if ($table->status == "確認中")

         <img src="{{url('img/status/status0.gif')}}"><br>
         <font color="#FFFFFF" size="6" face="微軟正黑體"><b>已通知櫃台</b></font>

    @elseif( $order->status == "出餐中" )

         <img src="http://www.ghost64.com/qqtupian/qqbiaoqing/161215533240/16.gif"><br>
         <font color="#FFFFFF" size="6" face="微軟正黑體"><b>正在製作餐點</b></font>

    @elseif($order->status == "用餐中" )

    <img src="{{url('img/status/status2.png')}}"><br>
       <font color="#FFFFFF" size="6" face="微軟正黑體"><b>餐點已全數完成 </b></font><br>  <font color="#FFFFFF" size="6" face="微軟正黑體"><b>★ 請慢用 ★ </b></font><br>




        <form method="get" action="{{route('order.checkout')}}">
           {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">
               <i ></i>我要結帳
            </button>
        </form> <br><br>






  @endif



