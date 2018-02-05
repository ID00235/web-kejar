<?php $__env->startSection("pagetitle","Informasi"); ?>
<?php $__env->startSection("subpage","Kecamatan Batin XXIV"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-1">
              <div class="share-it"></div>
              <div class="mb-20"></div>
        </div>
        <div class="col-md-7">
            <div class="blog-post gallery-post">
                  <div class="post-title">
                      <h3 class=""><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($halaman->nama); ?></span></a></h3>
                  </div>
                  <div class="post-isi">
                      <?php echo $halaman->isi;?>
                  </div>
            </div>   
        </div>       
        <div class="col-md-4">
           

            <div class="sidemenu">
                    <h4 class="classic-title"><span>Informasi</span></h4>
                    <?php
                    $informasi = DB::table('informasi')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    <?php foreach($informasi as $p): ?>
                      <?php
                              $url = URL::to("informasi/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="<?php echo e($url); ?>"><?php echo e($p->nama); ?></a></li>
                    <?php endforeach; ?>
                    </ul>
            </div>

            <div class="sidemenu">
                    <h4 class="classic-title"><span>Data Umum</span></h4>
                    <?php
                    $dataumum = DB::table('dataangka')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    <?php foreach($dataumum as $p): ?>
                      <?php
                              $url = URL::to("dataumum/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="<?php echo e($url); ?>"><?php echo e($p->nama); ?></a></li>
                    <?php endforeach; ?>
                    </ul>
            </div>

        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>