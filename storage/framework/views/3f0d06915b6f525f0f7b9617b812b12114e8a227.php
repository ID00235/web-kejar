<?php
$route  = "";
$menu = array();
$menu["profil"] = array();
?>

<?php $__env->startSection("pagetitle","Error 404 Page Not Found"); ?>
<?php $__env->startSection("subpage","PPID Kabupaten Batang Hari"); ?>
<?php $__env->startSection("pageslider"); ?>
    <?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<?php
$setting = DB::table('setting')->first();
?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">

        <div class="col-md-12">
            <p>&nbsp;</p>
           <center>
           <img src="<?php echo e(asset('images/404.png')); ?>" height="80"> 
           <p>&nbsp;</p>
           <a href="<?php echo e(URL::to('')); ?>" class="btn btn-cyan"><i class="fa fa-home"></i> Ke Halaman Depan</a>
           </center> 
            <p>&nbsp;</p>
        </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>