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
                    @if (count($item) > 0)
                        <li><a href="#item"> ITEM </a></li>
                    @endif
                    <li><a href="#menu"> MENU </a></li>


                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<a name="top" id="top"></a>
@foreach($orders as $order)





    @if (count($item) > 0)

        <section id="mu-restaurant-menu">
            <a name="item" id="item"></a>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-restaurant-menu-area">

                            <div class="mu-title">
                                <span class="mu-subtitle">點餐明細</span>
                                <h2>ITEM</h2>
                                <form method="POST" action="/order/{{$order->id}}/confirm">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <button type="submit" class="btn btn-success">
                                        <i ></i>送出餐點
                                    </button>

                                </form>
                                <br>
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
                                                            <div id="auto"></div>
                                                            <script>
                                                                $(document).ready( function(){
                                                                    $('#auto').load('ajaxdata');
                                                                    refresh();
                                                                });

                                                                function refresh()
                                                                {
                                                                    setTimeout( function() {
                                                                        $('#auto').load('ajaxdata');
                                                                        refresh();
                                                                    }, 2000);
                                                                }
                                                            </script>
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
    @endif









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
        <a name="menu" id="menu"></a>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-restaurant-menu-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">菜單</span>
                            <h2><font face="Comic Sans MS">OUR MENU</font></h2>
                        </div>

                        <div class="mu-restaurant-menu-content">
                            <ul class="nav nav-tabs mu-restaurant-menu">

                                <li class="active"><a href="#main" data-toggle="tab"><font face="微軟正黑體">主餐</font></a></li>
                                <li><a href="#appetizer-1" data-toggle="tab"><font face="微軟正黑體">開胃品</font></a></li>
                                <li><a href="#salad" data-toggle="tab"><font face="微軟正黑體">沙拉</font></a></li>
                                <li><a href="#appetizer-2" data-toggle="tab"><font face="微軟正黑體">前菜</font></a></li>
                                <li><a href="#soup" data-toggle="tab"><font face="微軟正黑體">湯品</font></a></li>
                                <li><a href="#dessert" data-toggle="tab"><font face="微軟正黑體">甜點</font></a></li>
                                <li><a href="#drink" data-toggle="tab"><font face="微軟正黑體">飲料</font></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div class="tab-pane fade in active" id="main">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==1)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                        <div class="col-md-6">
                                                            <div class="mu-tab-content-left">
                                                                <ul class="mu-menu-item-nav">
                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                              <div class="col-md-7">
                                                                                  <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                  <span class="mu-menu-price">${{$meal->price}}</span>
                                                                              </div>
                                                                              <div class="col-md-5">
                                                                                  <button type="submit" class="btn btn-success">
                                                                                      <i class="fa fa-plus"></i>我要這個
                                                                                  </button><br><br>
                                                                               </div>

                                                                                <div>
                                                                                    <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                </div>
                                                                                {{--                                                                            <p></p>--}}
                                                                            </div>
                                                                        </div>
                                                                        <hr class="style-one" />
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}
                                                           <div class="col-md-6">
                                                               <div class="mu-tab-content-right">
                                                                   <ul class="mu-menu-item-nav">
                                                                       <li>
                                                                           <div class="media">
                                                                               <div class="media-left">
                                                                                   <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                               </div>
                                                                               <div class="media-body">
                                                                                   <div class="col-md-7">
                                                                                       <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                       <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                   </div>
                                                                                   <div class="col-md-5">
                                                                                       <button type="submit" class="btn btn-success">
                                                                                           <i class="fa fa-plus"></i>我要這個
                                                                                       </button><br><br>
                                                                                   </div>


                                                                                   <div>

                                                                                       <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                   </div>
                                                                                   {{--                                                                            <p></p>--}}
                                                                               </div>
                                                                           </div>
                                                                           <hr class="style-one" />
                                                                       </li>
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                         </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="appetizer-1">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==2)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane fade" id="salad">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==3)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>





                                <div class="tab-pane fade" id="appetizer-2">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==4)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>






                                <div class="tab-pane fade" id="soup">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==5)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>







                                <div class="tab-pane fade" id="dessert">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==6)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>







                                <div class="tab-pane fade" id="drink">
                                    <div class="mu-tab-content-area">
                                        <div class="row">
                                            @foreach($meals as $meal)
                                                @if($meal->category_id==7)
                                                    @if(($meal->id)%2==1)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-left">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                    @if(($meal->id)%2==0)
                                                        <form method="POST" action="/order/{{$order->id}}/item">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-6">
                                                                <div class="mu-tab-content-right">
                                                                    <ul class="mu-menu-item-nav">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a><img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img"></a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="col-md-7">
                                                                                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                                                                                        <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <button type="submit" class="btn btn-success">
                                                                                            <i class="fa fa-plus"></i>我要這個
                                                                                        </button><br><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                                                                                    </div>
                                                                                    {{--                                                                            <p></p>--}}
                                                                                </div>
                                                                            </div>
                                                                            <hr class="style-one" />
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="quantity" value=1>
                                                            <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
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



@endforeach

@endsection


