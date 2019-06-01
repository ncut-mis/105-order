
@extends('layouts.index')


@foreach($order as $o)

@endforeach

@if ($order->status == '已結帳')
    <?php
    $url = "/checkout/successful";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
    ?>
@endif

@section('content')
<!-- Start header section -->
<header id="mu-header">
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- LOGO -->

                <!--  Text based logo  -->
                <a class="navbar-brand" href="#top">{{$restaurant->name}}<span>X</span></a>

                <!--  Image based logo  -->
                <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  -->


            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                    <li><a href="#top"> TOP </a></li>
                    <li><a href="#item"> 您的點單 </a></li>
                    {{--<li><a href="#mu-contact"> 優惠眷 </a></li>--}}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    @php
        $total=0;

    @endphp
    @foreach($item as $de)
        @php
            $total=$total+$de->meal->price;
        @endphp
    @endforeach
</header>
<a name="top" id="top"></a>

        <script>
            function alertFunc(){
                var xhr =new XMLHttpRequest();
                xhr.open("get","/order/{{$de->order_id}}/status",true);
                xhr.onload=function(){
                    var test=document.getElementById("test");
                    test.innerHTML=this.responseText;
                };

                xhr.send();
            }



            var myVar;
            myVar = setInterval(alertFunc, 3000);





        </script>


    <!-- End Chef Section -->
    <!-- End header section -->


    <!-- Start slider  -->

    <!-- End slider  -->

    <!-- Start About us -->

    <!-- End About us -->

    <!-- Start Counter Section -->

    <!-- End Counter Section -->
<section id="mu-reservation">
    <div class="container">  <a name="item" id="item"></a>
        <div class="row">
            <div id="test"  style="text-align:center;">
                <br><br>
            </div>
            <br>

            <div class="col-md-12">


                <div class="mu-reservation-area">

                    <div class="mu-title">
                        <span class="mu-subtitle">您的點單</span><br><br>

                    </div>

                    <div class="mu-reservation-content">




                        <div class="col-md-12">
                            <div class="mu-reservation-right">
                                <div class="mu-opening-hour">
                                    <h2>ITEM</h2>

                                    @php
                                        $total=0;

                                    @endphp
                                    @foreach($item as $de)
                                        @php
                                            $total=$total+$de->meal->price;
                                        @endphp
                                    @endforeach


                                        <ul class="list-unstyled">
                                            @foreach($item as $de)
                                                <li>
                                                    <p><font size="4" face="微軟正黑體">{{$de->meal->name}} X {{$de->quantity}} &nbsp  ${{$de->meal->price*$de->quantity}}</font> </p>

                                                </li>

                                            @endforeach
                                            <HR  >
                                            <li>
                                                <p><font size="6" face="微軟正黑體">總價 {{$total}}</font></p>

                                            </li>
                                        </ul>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
    <!-- Start Restaurant Menu -->


{{--@if (count($coupon) > 0)--}}
    {{--<link rel="stylesheet" href="/css/mbr-additional.css" >--}}
    {{--<section class=" cid-roWi99jfvR  " id="mu-contact">--}}

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="mu-contact-area">--}}



                {{--<div class="mu-title">--}}
                        {{--<span class="mu-subtitle">Coupon</span>--}}
                    {{--<h2><font face="微軟正黑體">您的優惠卷</font></h2>--}}
                    {{--<br>--}}
                    {{--<h1><font face="微軟正黑體">結帳前出示欲使用之優惠卷給櫃檯人員，並讓櫃檯人員點擊 使用優惠卷 即可享有優惠</font></h1>--}}
                     {{--</div>--}}

                    {{--<br> <br> <br> <br>--}}


                    {{--<br> <br> <br> <br>--}}
                    {{--<br> <br> <br> <br>--}}
                    {{--<br> <br> <br> <br>--}}
                   {{--<br>--}}

                    {{--<div class="container">--}}
                        {{--<div class="media-container-row row">--}}
                            {{--@foreach($coupon as $cs)--}}
                                {{--@if ($cs->UseTime == Null)--}}
                                    {{--@if (\Carbon\Carbon::now()->diffInDays($cs->EndTime, false)>0)--}}
                                {{--<div class="card  col-12 col-md-6 col-lg-4">--}}
                                    {{--<div class="card-img">--}}
                                        {{--<img src="{{url('img/coupon/'. $cs->photo)}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="card-box align-center">--}}
                                        {{--<div class="mbr-section-btn text-center">--}}
                                        {{--<h4 class="card-title mbr-fonts-style display-5">--}}
                                                {{--<font face="微軟正黑體">剩餘  {{\Carbon\Carbon::now()->diffInDays($cs->EndTime, false) }}  天</font>--}}

                                        {{--</h4>--}}

                                        {{--<p class="mbr-text mbr-fonts-style display-7">--}}
                                            {{--<font face="微軟正黑體">{{$cs->title}}</font>--}}
                                        {{--</p>--}}
                                            {{--<form method="POST" action="/MemberCoupons/{{$cs->id}}/use">--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--{{ method_field('POST') }}--}}
                                                {{--<button type="submit" class="btn btn-secondary display-4">--}}
                                                    {{--<i ></i>使用優惠卷--}}
                                                {{--</button>--}}

                                            {{--</form>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--@endif--}}




@endsection








