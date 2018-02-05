
<?php $__env->startSection("pagetitle",$pengumuman->judul); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagepengumuman", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <div class="blog-post gallery-post">
                  <div class="post-content">
                      <div class="post-type"><i class="fa fa-bullhorn"></i></div>
                      <h2><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($pengumuman->judul); ?></span></a></h2>
                      <ul class="post-meta">
                        <li><i class="fa fa-calendar"></i> Posted On: <?php echo e(timestamp_indo2($pengumuman->created_at)); ?></li>
                        <li><i class="fa fa-eye"></i> Dilihat: <?php echo e($pengumuman->dibaca); ?> Kali</li>
                      </ul>
                  </div>
                  <?php if($pengumuman->gambar): ?>
                  <div class="post-head" style="margin-top: 20px;">
                      <div class = "thumbnail">
                           <img width="100%" src = "<?php echo e(asset('pengumuman/'.$pengumuman->gambar)); ?>" class="img-responsive">
                           <div class = "caption"><?php echo e($pengumuman->title_gambar); ?></div>
                      </div>
                  </div>
                  <?php endif; ?>
                  <br>Berbagi ke Jejaring Sosial: <div class="share-it"></div><br>
                  <div class="post-isi">
                      <?php echo $pengumuman->isi;?>
                  </div>
            </div>       
            <p></p>
        </div>

        <div class="col-md-4">
            <div class="tabs-section latest-posts-classic">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-2" data-toggle="tab"><i class="fa fa-bookmark-o"></i>Populer</a></li>
                </ul>

                 <div class="tab-content">
                      <div class="tab-pane fade in active" id="tab-2">
                          <?php
                              $pengumuman_populer = DB::table('pengumuman')->orderby('dibaca','desc')
                                                ->offset(0)->limit(5)->get();
                          ?>
                          <?php foreach($pengumuman_populer as $bt): ?>
                          <?php
                              $url = URL::to("baca-pengumuman/".$bt->id."/".generate_url($bt->judul));
                          ?>
                          <div class="post-row item">
                            <div class="left-meta-post">
                              <div class="post-date"></div>
                              <div class="post-type"><i class="fa fa-bullhorn"></i></div>
                            </div>
                            <h4 class="post-title"><a href="<?php echo e($url); ?>"><?php echo e($bt->judul); ?></a></h4>
                            <div class="post-content">
                              <p><?php echo e(timestamp_indo2($bt->created_at)); ?></p>
                            </div>
                          </div><br>
                          <?php endforeach; ?>
                      </div>
                 </div>

            </div>
            <div style="margin-top: 20px;"></div>
            <p class="pull-right">
              <a href="<?php echo e(URL::to('semua-pengumuman')); ?>"> Lihat Pengumuman Lainnya <i class="fa fa-angle-right"></i></a>
            </p>
        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>