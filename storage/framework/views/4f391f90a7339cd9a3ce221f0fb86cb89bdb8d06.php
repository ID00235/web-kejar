<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
  <!-- Basic -->
  <title><?php echo $__env->yieldContent("pagetitle"); ?> | PPID Kab. Batang Hari</title>
  <!-- Define Charset -->
  <meta charset="utf-8">
  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
  <!-- Page Description and Author -->
  <meta name="description" content="<?php $__env->startSection("pagetitle"); ?><?php echo $__env->yieldSection(); ?>">
  <meta name="author" content="PPID Kabupatn BatangHari">
  <?php echo SEOMeta::generate(); ?>

  <?php echo OpenGraph::generate(); ?>

  <?php echo Twitter::generate(); ?>

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="<?php echo e(asset('front/asset/css/bootstrap.min.css')); ?>" type="text/css" media="screen">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('front/css/font-awesome.min.css')); ?>" type="text/css" media="screen">
  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/slicknav.css')); ?>" media="screen">
  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/style.css')); ?>" media="screen">
  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/responsive.css')); ?>" media="screen">
  <!-- Css3 Transitions Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/animate.css')); ?>" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('share/jssocials.css')); ?>" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('share/jssocials-theme-flat.css')); ?>" media="screen">
  <link href="<?php echo e(asset('css/icon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('bower_components/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet">
  <!-- Color CSS Styles  -->
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/colors/cyan.css')); ?>" title="blue" media="screen" />
  

  <!-- Margo JS  -->
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery-2.1.4.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.migrate.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/modernizrr.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/asset/js/bootstrap.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.fitvids.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/owl.carousel.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/nivo-lightbox.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.isotope.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.appear.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/count-to.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.textillate.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.lettering.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.easypiechart.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.nicescroll.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.parallax.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('front/js/jquery.slicknav.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('share/jssocials.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/notify.js')); ?>"></script>
  <script src="<?php echo e(asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
  
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
    <div class="hidden-header" style="height: 112px;"></div>
    <?php echo $__env->make("frontend.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- End Header Section -->

    <!-- Start Home Page Slider -->
    <?php $__env->startSection("pageslider"); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- End Home Page Slider -->


    <!-- Start Content -->
    <div id="content">
      <?php $__env->startSection("content"); ?>
      <?php echo $__env->yieldSection(); ?>
    </div>
    <!-- End Content -->


    <!-- Start Footer -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">

          <?php if($route=='home'): ?>

          <div class="col-md-3">
            <div class="footer-widget contact-widget">
                <center>
                <img  class="img img-responsive" src="<?php echo e(asset('images/logo-ppid.png')); ?>" alt="logo batanghari"><br>
                  <p>Dikelola Oleh: <br>
                 <strong> <small>Pemerintah Daerah Kabupaten Batang Hari</small> <br> Dinas Komunikasi dan Informatika <br>  &copy;2017
                 </strong><p>
                </center>
            </div>
          </div>

          <!-- Start Contact Widget -->
          <div class="col-md-3">
            <div class="footer-widget contact-widget">
              <h4>Kontak<span class="head-line"></span></h4>
              <p>Pejabat Pengelola Informasi dan Dokumentasi <br> Pemerintah Daerah Kabupaten Batang Hari</p>
              <p><?php echo e($setting->alamat); ?></p>
              <ul>
                <li><span><i class="fa fa-phone"></i> Telepon:</span> <?php echo e($setting->telepon); ?></li>
                <li><span><i class="fa fa-envelope-o"></i> Email:</span> <?php echo e($setting->email); ?></li>
                <li><span><i class="fa fa-link"></i> Website:</span> ppid.batangharikab.go.id</li>
                <li><span><i class="fa fa-twitter"></i> Twitter:</span> <a href="<?php echo e($setting->twitter); ?>" target="_blank">@batangharikab</a></li>
              </ul>
            </div>
          </div>

           
          <div class="col-md-6">
          <div class="footer-widget contact-widget">
            <div id="map" style="border: 2px solid #e4e5e6;"></div>
            </div>
          </div>
          


          <hr>
          <?php endif; ?>
         
          
          
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->
        </div>
        <!-- row -->
        <?php if($route!='home'): ?>
        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-12">
              <center><strong><h4>&copy; 2017 PPID - Kabupaten Batang Hari <br><small>Dinas Komunikasi dan Informatika</small></h4> </strong></center>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- End Copyright -->
      </div>
    </footer>
    <!-- End Footer -->

    <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
  
  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
  <?php $__env->startSection("javascript"); ?>
    <script type="text/javascript" src="<?php echo e(asset('front/js/script.js')); ?>"></script>
    <?php if($route=='home'): ?>
      <script>
        function initMap() {
          var myLatLng = {lat: -1.714728608246543, lng: 103.26113524422294};

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng
          });

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
          });

        }
      </script>
      
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD49vTKioTtPD2A0auT0jy8lICyNgUGjSA&callback=initMap">
      </script>
    <?php endif; ?>
  <?php echo $__env->yieldSection(); ?>
  
</body>
</html>