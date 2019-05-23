
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

                    <li><a href="/menu"> MENU </a></li>




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



@endforeach

@endsection
