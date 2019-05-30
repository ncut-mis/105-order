@extends('layouts.index')
<style>

    html, body {

        background-image: url('/img/background1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }



</style>

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

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </header>
    <a name="top" id="top"></a>


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
                            <span class="mu-subtitle"> <font color="#000000" size="6" face="微軟正黑體"><b>★ 結帳完畢 ★ </b></font></span>
                            <br>
                            <img src="{{url('img/status/end.gif')}}">
                        </div>

                        <img src="{{url('img/status/status3.png')}}">


















                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
