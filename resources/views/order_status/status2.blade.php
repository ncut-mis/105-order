
<img src="{{url('img/status/status2.png')}}"><br>
<font color="#FFFFFF" size="6" face="微軟正黑體"><b>餐點已全數完成 </b></font><br>
<font color="#FFFFFF" size="6" face="微軟正黑體"><b>★ 請慢用 ★ </b></font>
<br>
<form method="get" action="{{route('order.checkout')}}">
{{ csrf_field() }}
    <button type="submit" class="btn btn-primary">
        <i ></i>我要結帳
    </button>

</form>



<br><br>

