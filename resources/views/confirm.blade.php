
@extends('layouts.index')

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
                    <li><a href="#item"> ITEM </a></li>

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


    <!-- End Chef Section -->
    <!-- End header section -->


    <!-- Start slider  -->

    <!-- End slider  -->

    <!-- Start About us -->

    <!-- End About us -->

    <!-- Start Counter Section -->

    <!-- End Counter Section -->

    <!-- Start Restaurant Menu -->
<section id="mu-restaurant-menu">
    <div id="test"  style="text-align:center;">
        <br><br><br> <br><br>
    </div>
    <br>
    <a name="item" id="item"></a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-restaurant-menu-area">

                    <div class="mu-title">
                        <span class="mu-subtitle">點餐明細</span>
                        <h2>總價 {{$total}}</h2>

                    </div>

                    <div class="mu-restaurant-menu-content">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" >
                                <div class="mu-tab-content-area">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="mu-tab-content-left">

                                                <ul class="mu-menu-item-nav">
                                                    @foreach($item as $de)




                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#">
                                                                            <img class="media-object" src="{{url('img/meal/'.$de->meal->photo)}}" alt="img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading"><a href="#">{{$de->meal->name}}</a></h4>
                                                                        <span class="mu-menu-price">數量: {{$de->quantity}} | ${{$de->meal->price*$de->quantity}}</span>
                                                                        <br>

                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>


                                                                    </div>

                                                                </div>

                                                            </li>


                                                    @endforeach


                                                </ul>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>











                </div>
            </div>
        </div>
    </div>


</section>



@endsection








