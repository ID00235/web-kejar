
<?php $__env->startSection("pagetitle","Layanan Informasi PPID"); ?>
<?php $__env->startSection("subpage","Mekanisme Layanan Informasi PPID Kabupaten Batang Hari"); ?>
<?php $__env->startSection("subtitle","Prosedur"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <div class="blog-post gallery-post">
                  <div class="post-content">
                      <div class="post-type"><i class="fa fa-bookmark-o"></i></div>
                      <h2 class=""><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($prosedur->nama); ?></span></a></h2>
                  </div>
                  <div class="post-head" style="margin-top: 20px;">
                       
                  </div>
                  <div class="post-isi">
                      <?php echo $prosedur->isi;?>
                  </div>
               </br>Berbagi ke Jejaring Sosial: <div class="share-it"></div>
            </div>   
        </div>       
           
        <div class="col-md-4">
           
            <div class="latest-posts-classic" style="background: url(images/folder.png)  no-repeat right bottom;">
             <h4 class="classic-title"><span>Prosedur Lainnya..</span></h4>
              <?php
              $id =  $prosedur->id;
              $list_prosedur= DB::table('prosedur')->whereRaw("id <> $id")->get();
              ?>
                  <?php foreach($list_prosedur as $p): ?>
                   <div class="post-row">
                      <div class="left-meta-post">
                        <div class="post-type hidden-xs"><i class="fa fa-hand-o-right"></i></div>
                        <i class="fa fa-hand-o-right  hidden-md hidden-sm hidden-lg"></i>
                      </div>
                      <h5 class="post-title"><a href="<?php echo e(URL::to("prosedur/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a></h5>
                      <div class="post-content">
                        <p class="hidden-xs">Profil PPID</p>
                      </div>
                    </div>
                  <?php endforeach; ?>

                     <h4 class="classic-title"><span>Halaman Profil</span></h4>
                  <?php
                    $profil = DB::table('profil')->get();
                  ?>
                  <?php foreach($profil as $p): ?>
                  <!-- Post 1 -->
                  <div class="post-row">
                    <div class="left-meta-post">
                      <div class="post-type hidden-xs"><i class="fa fa-bookmark-o"></i></div>
                      <i class="fa fa-bookmark-o hidden-md hidden-sm hidden-lg"></i>
                    </div>
                    <h5 class="post-title"><a href="<?php echo e(URL::to("profil/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a></h5>
                    <div class="post-content">
                      <p class="hidden-xs">Profil PPID</p>
                    </div>
                  </div>
                  <?php endforeach; ?>

                    <p><a href="<?php echo e(URL::to("permohonan/ajukanpermohonan")); ?>" class="btn btn-cyan"><i class="fa fa-paper-plane"></i> Ajukan Permohonan Infomasi</a></p>
             </div>
             

        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>