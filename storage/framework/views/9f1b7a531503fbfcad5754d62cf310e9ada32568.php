<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
<div class="page-banner">
    <div class="container">
    <div class="col-md-6">
      <h2 id="animated-text" class="hidden">
            Dokumen Informasi Publik
      </h2>
      <small>PPID Kabupaten Batang Hari</small>
      </div>
      <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo e(URL::to("")); ?>">Home</a></li>
              <li><?php $__env->startSection("subtitle"); ?> <?php echo $__env->yieldSection(); ?></li>
            </ul>
          </div>
    </div>
  </div>

  