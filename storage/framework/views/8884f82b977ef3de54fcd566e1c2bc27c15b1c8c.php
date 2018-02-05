<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login WEB Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-themes.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <script src="<?php echo e(asset('js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
</head>

<body style="background-image:url('images/login.jpg')">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <div class="container" style="padding-top:5%;">
        <div class="col-md-12 col-xs-12">
            <center>
               <form action="<?php echo e(URL::to('login/submitlogin')); ?>" method="post" name="Login_Form" class="one-edge-shadow form-signin">
                <div class="ribbon-wrapper ribbon-er">
                    <p>&nbsp;</p>
                    <img src="<?php echo e(asset('images/ppid-front.png')); ?>" class="img img-responsive" height="40px;">
                </div>
                <hr>
            	<br>
                <?php if($errors->has('login')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo e($errors->first('login')); ?>

                </div>
                <?php endif; ?>
                <?php if(isset($google_error)): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo e($google_error); ?>

                </div>
                <?php endif; ?>
                 <?php echo e(csrf_field()); ?>

                <div class="form-group <?php if($errors->has('username')): ?> has-error <?php endif; ?>">
                    <?php if($errors->has('username')): ?> <small class="text-danger"><?php echo e($errors->first('username')); ?></small> <?php endif; ?>
                    <input type="text" class="form-control" required name="username" placeholder="Username" autofocus="" value="<?php echo e(old('username')); ?>" />
                </div>
                <div class="form-group">
                    <?php if($errors->has('password')): ?> <small class="text-danger"><?php echo e($errors->first('password')); ?></small> <?php endif; ?>
                    <input type="password" class="form-control" required name="password" placeholder="Password" />
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>
                <a href="<?php echo e(url('')); ?>"class="btn btn-sm btn-warning btn-block" name="Submit" value="Login" type="Submit">Ke Beranda Website</a>
               
                
            </form> 
            </center>            
        </div>     
    </div>
    <script src="<?php echo e(asset('js/vendor/jquery-1.12.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    
</body>

</html>
