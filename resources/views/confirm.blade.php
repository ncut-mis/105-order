
@php
    $total=0;

@endphp
<div  style="text-align:center;">
    <font color="#000000" size="6" face="微軟正黑體"><b>★ 您的點餐明細 ★</b></font><br><br>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th width="200" style="text-align: center">圖</th>
                    <th width="200" style="text-align: center">餐點名稱</th>
                    <th width="200" style="text-align: center">數量</th>
                    <th width="150" style="text-align: center">價格</th>

                </tr>
                </thead>
                <tbody>

                @foreach($item as $de)

                    @php
                        $total=$total+$de->meal->price;
                    @endphp
                        <tr>

                            <td style="text-align: center"><img src="{{url('img/meal/'.$de->meal->photo)}}"width="80" height="40"></td>

                            <td style="text-align: center">{{$de->meal->name}}</td>
                            <td style="text-align: center">{{$de->quantity}}</td>
                            <td style="text-align: center">{{$de->meal->price*$de->quantity}}</td>


                        </tr>



                @endforeach


            </table >
            <div  style="text-align:center;">
                總價 {{$total}}
            </div>
            <br>


            <script>
                function alertFunc(){
                    var xhr =new XMLHttpRequest();
                    xhr.open("get","/order/{{$de->order_id}}/checkout",true);
                    xhr.onload=function(){
                        var test=document.getElementById("test");
                        test.innerHTML=this.responseText;
                    };

                    xhr.send();
                }



                var myVar;
                    myVar = setInterval(alertFunc, 3000);





            </script>
            <div id="test"  style="text-align:center;">

            </div>

            <br>
            <br>
            <br>
            <div   style="text-align:center;">
            @if (count($coupon) > 0)
                    <font color="#000000" size="5" face="微軟正黑體"><b>★ 您的優惠卷 ★</b></font><br><br>

                    <table >
                    <thead>
                    <tr>

                        <th width="200" style="text-align: center">優惠卷名稱</th>
                        <th width="200" style="text-align: center">說明</th>
                        <th width="200" style="text-align: center">操作</th>


                    </tr>
                    </thead>
                    @foreach($coupon as $co)
                        <form method="POST" action="/order/{{$de->order_id}}/coupons/{{$co->id}}">
                            {{ csrf_field() }}
                            <tbody>
                        <tr>



                            <td style="text-align: center">{{$co->title }}</td>
                            <td style="text-align: center"> {{$co->content }} </td>
                            <td style="text-align: center"> <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>使用
                                </button></td>


                        </tr>
                            </tbody>

                        </form>

                    @endforeach
                    </table >
                </div>
            @endif

        </div>
    </div>
</div>
