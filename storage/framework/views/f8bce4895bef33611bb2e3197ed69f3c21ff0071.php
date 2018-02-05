<div class="page-banner">
    <div class="container">
    <div class="col-md-6">
      <h2 id="animated-text" class="hidden">
             <?php $__env->startSection("pagetitle"); ?>
             <?php echo $__env->yieldSection(); ?>
      </h2>
      <small><?php $__env->startSection("subpage"); ?>
             <?php echo $__env->yieldSection(); ?></small>
      </div>
      <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo e(URL::to("")); ?>">Home</a></li>
              <li><?php $__env->startSection("subtitle"); ?> <?php echo $__env->yieldSection(); ?></li>
            </ul>
          </div>
    </div>
  </div>

  