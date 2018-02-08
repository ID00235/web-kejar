<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
  <!-- Basic -->
  <title><?php echo $__env->yieldContent("pagetitle"); ?> | Kejaksaan Negeri Batanghari</title>
  <!-- Define Charset -->
  <meta charset="utf-8">
  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
  <!-- Page Description and Author -->
  <meta name="description" content="<?php $__env->startSection("pagetitle"); ?><?php echo $__env->yieldSection(); ?>">
  <meta name="author" content="Kejaksaan Negeri Batanghari">
  <?php echo SEOMeta::generate(); ?>

  <?php echo OpenGraph::generate(); ?>

  <?php echo Twitter::generate(); ?>

  <!-- Bootstrap CSS  -->s
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
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/colors/jade.css')); ?>" title="blue" media="screen" />
  

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
    <!-- <div class="hidden-header" style="height: 112px;"></div>-->
   
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
        <div class="row">
            <div class="col-md-12">
              <center><strong><h4 style="color:white !important;">
              Pemerintah Daerah Kabupaten Batang Hari<br>
              &copy; 2018 Kejaksaan Negeri Batanghari</h4> </strong>
              <small style="color:white;">
                <?php
                $setting = DB::table('setting')->first();
                ?>
                <?php echo e($setting->alamat); ?>, <i class="fa fa-telephone"></i>Telp. <?php echo e($setting->telepon); ?> <i class="fa fa-mail"></i>Email: <?php echo e($setting->email); ?>

              </small>
              </center>
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
  <?php $__env->startSection("javascript"); ?>
    <script type="text/javascript" src="<?php echo e(asset('front/js/script.js')); ?>"></script>
  <?php echo $__env->yieldSection(); ?>
  
</body>
</html>