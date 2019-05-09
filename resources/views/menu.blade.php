<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$restaurant->name}} | 點餐</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.css') }}">
     <!-- Gallery Lightbox -->
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

  </head>
  <body>

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  <!-- END SCROLL TOP BUTTON -->

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
          <a class="navbar-brand" href="index.html">{{$restaurant->name}}<span>X</span></a>

		      <!--  Image based logo  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  -->

          @foreach($orders as $order)
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="index.html"> HOME </a></li>
            <li><a href="#mu-restaurant-menu"> MENU </a></li>
            <li><a href="#mu-chef"> ITEM </a></li>


          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </header>




  <!-- End header section -->


  <!-- Start slider  -->

  <!-- End slider  -->

  <!-- Start About us -->

  <!-- End About us -->

  <!-- Start Counter Section -->

  <!-- End Counter Section -->

  <!-- Start Restaurant Menu -->

  <section id="mu-restaurant-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-restaurant-menu-area">

            <div class="mu-title">
              <span class="mu-subtitle">{{$restaurant->name}}</span>
              <h2>OUR MENU</h2>
            </div>

            <div class="mu-restaurant-menu-content">
              <ul class="nav nav-tabs mu-restaurant-menu">
                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                <li><a href="#meals" data-toggle="tab">主餐</a></li>
                <li><a href="#appetizers" data-toggle="tab">開胃品</a></li>
                <li><a href="#salads" data-toggle="tab">沙拉</a></li>
                <li><a href="#Appetizer" data-toggle="tab">前菜</a></li>
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




                <div class="tab-pane fade in active" id="meals">
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


                <div class="tab-pane fade in active" id="appetizers">
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



                <div class="tab-pane fade in active" id="salads">
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








                <div class="tab-pane fade in active" id="Appetizer">
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








                <div class="tab-pane fade" id="drink">
                  <div class="mu-tab-content-area">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="mu-tab-content-left">
                          <ul class="mu-menu-item-nav">
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="img/menu/item-9.jpg" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">English Breakfast</a></h4>
                                  <span class="mu-menu-price">$15.85</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>
                                </div>
                              </div>
                            </li>
                             <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="img/menu/item-10.jpg" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">Chines Breakfast</a></h4>
                                  <span class="mu-menu-price">$11.95</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>
                                </div>
                              </div>
                            </li>
                             <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="img/menu/item-9.jpg" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">Indian Breakfast</a></h4>
                                  <span class="mu-menu-price">$15.85</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>
                                </div>
                              </div>
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
          </div>
        </div>
      </div>


  </section>

  <!-- End Restaurant Menu -->

  <!-- Start Reservation section -->




  <!-- End Reservation section -->

  <!-- Start Gallery -->

              <!-- Start gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

  <div id="test"></div>

  <button type="button" onclick="alertFunc();">AJAX明細</button>
  <br>
                <!-- start single gallery image -->
  <script type="text/javascript">
    function alertFunc(){
      var xhr =new XMLHttpRequest();
      xhr.open("get","/order/{{$order->id}}/item/test",true);
      xhr.onload=function(){
        var test=document.getElementById("test");
         var ourData =JSON.parse(this.response);



        console.log(ourData);
        for(var i=0, a=1;i<ourData[0].item.length;i++ ,a++){
          var str="";
          str ="第"+a+"筆點餐明細 id="+ ourData[0].item[i].id +" 名稱="+ ourData[0].item[i].name +" 價格="+ ourData[0].item[i].price  ;

          alert(str);
        }






      };


      xhr.send();
    }
    <!-- 重複執行Ajax

    var myVar;
    function myFunction() {
      myVar = setInterval(alertFunc,30000);
    }



    -->
  </script>







      <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->

                <!-- start single gallery image -->

                <!-- End single gallery image -->


  <!-- End Gallery -->

  <!-- Start Client Testimonial section -->


              <!-- testimonial content -->

                <!-- testimonial slider -->

  <!-- End Client Testimonial section -->

  <!-- Start Chef Section -->
  <section id="mu-chef">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-chef-area">

            <div class="mu-title">
              <span class="mu-subtitle">點餐明細</span>
              <h2>ITEM</h2>
              <span id="total">_</span>　

            </div>









              <ul class="mu-menu-item-nav">
                @foreach($item as $de)
                  <form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}


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
                                      <button type="submit" class="btn btn-success">
                                          <i class="fa fa-minus"></i> 我不要了
                                      </button>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                                  </div>

                              </div>

                          </li>
                          <input type="hidden" name="quantity" value=1>
                          <input type="hidden" name="meal_id" value=" {{$meal->id}}">
                      </form>



                  <SCRIPT >


                    $total =$total + "{{$de->meal->price}}";

                    document.getElementById("total").innerHTML= "總價:" + $total ;

                  </SCRIPT>

                  @endforeach


              </ul>


          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Chef Section -->


  @endforeach
  <!-- Start Contact section -->

  <!-- End Contact section -->

  <!-- Start Map section -->

  <!-- End Map section -->

  <!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           <div class="mu-footer-social">
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-google-plus"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-youtube"></span></a>
          </div>
          <div class="mu-footer-copyright">
            <p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- jQuery library -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- Slick slider -->
  <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{ asset('js/simple-animated-counter.js') }}"></script>
  <!-- Gallery Lightbox -->
  <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <!-- Ajax contact form  -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

  <!-- Custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>

  </body>
</html>