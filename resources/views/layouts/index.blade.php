<!DOCTYPE html>
<html lang="en">
<style>




</style>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
</a>
<!-- END SCROLL TOP BUTTON -->

@yield('content')

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