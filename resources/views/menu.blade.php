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
                            <h2>OUR MENU</h2>
                        </div>

                        <div class="mu-restaurant-menu-content">
                            <ul class="nav nav-tabs mu-restaurant-menu">
                                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                                <li><a href="#meals" data-toggle="tab">主餐</a></li>
                                <li><a href="#appetizers" data-toggle="tab">開胃品</a></li>
                                <li><a href="#salads" data-toggle="tab">沙拉</a></li>
                                <li><a href="#Appetizer" data-toggle="tab">前菜</a></li>
                                <li><a href="#soup" data-toggle="tab">湯品</a></li>
                                <li><a href="#dessert" data-toggle="tab">甜點</a></li>
                                <li><a href="#drink" data-toggle="tab">飲料</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="all">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)
                                                            <form method="POST" action="/order/{{$order->id}}/item">
                                                                {{ csrf_field() }}


                                                                <li>
                                                                    <div class="media">
                                                                        <div class="media-left">
                                                                            <a href="#">
                                                                                <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                            <span class="mu-menu-price">${{$meal->price}}</span>
                                                                            <br>
                                                                            <button type="submit" class="btn btn-success">
                                                                                <i class="fa fa-plus"></i>我要這個
                                                                            </button>
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                                                                        </div>

                                                                    </div>

                                                                </li>


                                                                <input type="hidden" name="quantity" value=1>
                                                                <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                            </form>
                                                        @endforeach


                                                    </ul>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane fade" id="meals">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if("$meal->category_id" == 1)



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="appetizers">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 2 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="salads">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 3 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>

                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>








                                <div class="tab-pane fade" id="Appetizer">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 4 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>





                                <div class="tab-pane fade" id="soup">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 5 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>

                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
















                                <div class="tab-pane fade" id="dessert">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 6 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>

                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>






                                <div class="tab-pane fade" id="drink">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mu-tab-content-left">

                                                    <ul class="mu-menu-item-nav">
                                                        @foreach($meals as $meal)

                                                            @if($meal->category_id == 7 )



                                                                <form method="POST" action="/order/{{$order->id}}/item">
                                                                    {{ csrf_field() }}


                                                                    <li>
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#">
                                                                                    <img class="media-object" src="{{url('img/meal/'. $meal->photo)}}" alt="img">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading"><a href="#">{{$meal->name}}</a></h4>
                                                                                <span class="mu-menu-price">${{$meal->price}}</span>
                                                                                <br>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    <i class="fa fa-plus"></i>我要這個
                                                                                </button>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>

                                                                            </div>

                                                                        </div>

                                                                    </li>
                                                                    <input type="hidden" name="quantity" value=1>
                                                                    <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                                                                </form>
                                                            @endif
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


    </section>



@endforeach

@endsection


