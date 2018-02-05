<div class="container">
    <div class="row" style="margin-left: -90px !important;">
        <div class="col-md-8">
            <!-- Logo -->
            <div class="logo">
                <h1><a href="<?php echo e(URL::to('admin/home')); ?>">
                    <img src="<?php echo e(asset('images/ppid-front.png')); ?>" height="40">
                </a></h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="navbar navbar-inverse" role="banner">
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $user = Auth::user();
                        $picture = $user->avatar;
                        ?>
                        <?php if($picture): ?>
                            <img height="30" src="<?php echo e($picture); ?>" class="img img-circle"> &nbsp; 
                        <?php endif; ?>
                        <?php echo e($user->nama); ?>

                        <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu animated bounceUpDown">
                            <li>
                                <a href="<?php echo e(URL::to('/admin/akun')); ?>">Pengaturan Akun</a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to('/admin/logout')); ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </nav>
            </div>
        </div>
    </div>
</div>