<?php $__env->startSection("pagetitle","Kelurahan dan Desa"); ?>
<?php $__env->startSection("subpage","Profil Kelurahan / Desa Kecamatan Batin XXIV"); ?>
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
                  <h3 class=""> <center><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($halaman->nama); ?></span></a></center></h3>
                  <center><?=$halaman->alamat_kantor;?></center>
                  <p>
                      <center>
                        <div class="thumbnail" style="width: 180px;">
                          <img   src="<?php echo e(asset($halaman->photo_lurah)); ?>">
                            <div class="caption">
                                <center><b><?=$halaman->nama_lurah;?></b></center>
                                <center>
                                    <?php if($halaman->tipe=='kelurahan'): ?>
                                    (Kepala Kelurahan)
                                    <?php else: ?>
                                    (Kepala Desa)
                                    <?php endif; ?>
                                </center>
                            </div>
                        </div>
                      </center>  
                  </p>
                  <p>                          
                   <center>
                    <?php if($halaman->tipe=='kelurahan'): ?>
                    Pejabat Kelurahan
                    <?php else: ?>
                    Pejabat Desa
                    <?php endif; ?>
                    </center>
                  </p>
                  <p>
                      <?php echo $halaman->pejabat_kelurahan; ?>

                  </p>
                  <p>
                      <div class="thumbnail">
                          <img  width="100%"  src="<?php echo e(asset($halaman->photo_kantor)); ?>">
                          <div class="caption">
                              <center><b>Kantor <?php echo e($halaman->nama); ?></b></center>
                          </div>
                      </div>
                  </p>
            </div>   
        </div>       
        <div class="col-md-4">
            <div class="sidemenu">
                    <h4 class="classic-title"><span>Kelurahan / Desa Lainnya</span></h4>
                    <?php
                      $kelurahan = DB::table('kelurahan')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    <?php foreach($kelurahan as $p): ?>
                      <?php
                              $url = URL::to("kelurahan/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="<?php echo e($url); ?>"><?php echo e($p->nama); ?></a></li>
                    <?php endforeach; ?>
                    </ul>
            </div>

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

        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>