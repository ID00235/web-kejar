<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
  <!-- Basic -->
  <title>@yield("pagetitle") | Kecamatan Batin XXIV</title>
  <!-- Define Charset -->
  <meta charset="utf-8">
  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <!-- Page Description and Author -->
  <meta name="description" content="@section("pagetitle")@show">
  <meta name="author" content="Kecamatan Batin XXIV">
  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}
  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="{{asset('front/asset/css/bootstrap.min.css')}}" type="text/css" media="screen">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}" type="text/css" media="screen">
  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/slicknav.css')}}" media="screen">
  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" media="screen">
  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}" media="screen">
  <!-- Css3 Transitions Styles  -->
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{asset('share/jssocials.css')}}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{asset('share/jssocials-theme-flat.css')}}" media="screen">
  <link href="{{asset('css/icon.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
  <!-- Color CSS Styles  -->
  
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/colors/jade.css')}}" title="blue" media="screen" />
  

  <!-- Margo JS  -->
  <script type="text/javascript" src="{{asset('front/js/jquery-2.1.4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.migrate.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/modernizrr.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/asset/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.fitvids.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/nivo-lightbox.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.isotope.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.appear.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/count-to.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.textillate.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.lettering.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.easypiechart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.nicescroll.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.parallax.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.slicknav.js')}}"></script>
  <script type="text/javascript" src="{{asset('share/jssocials.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap-notify.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/notify.js')}}"></script>
  <script src="{{asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
  
  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>
  <?php
  $setting = DB::table('setting')->first();
  ?>
  <!-- Full Body Container -->
  <div id="container" class="boxed-page">

    <!-- Start Header Section -->
    <!-- <div class="hidden-header" style="height: 112px;"></div>-->
    @include("frontend.header")
    <!-- End Header Section -->

    <!-- Start Home Page Slider -->
    @section("pageslider")
    @show
    <!-- End Home Page Slider -->


    <!-- Start Content -->
    <div id="content">
      @section("content")
      @show
    </div>
    <!-- End Content -->


    <!-- Start Footer -->
    <footer>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <strong><h4 style="color:white !important;">
              &copy; 2018 Kejaksaan Negeri Kab. Batang Hari<br>
              </h4> </strong>
              <small style="color:white;">
                <?php
                $setting = DB::table('setting')->first();
                ?>
                {{$setting->alamat}}, <i class="fa fa-telephone"></i>Telp. {{$setting->telepon}} <i class="fa fa-mail"></i>Email: {{$setting->email}}
              </small>
              <br>
            </div>
          </div>
        <!-- End Copyright -->
      </div>
    </footer>
    <!-- End Footer -->

   
  
  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
  @section("javascript")
    <script type="text/javascript" src="{{asset('front/js/script.js')}}"></script>
  @show
  
</body>
</html>