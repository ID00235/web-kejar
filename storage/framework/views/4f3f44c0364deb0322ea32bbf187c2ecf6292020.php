<?php $__env->startSection("pagetitle",$berita->judul); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pageberita", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <div class="blog-post gallery-post">
                  <div class="post-content">
                      <div class="post-type"><i class="fa fa-newspaper-o"></i></div>
                      <h2><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($berita->judul); ?></span></a></h2>
                      <ul class="post-meta">
                        <li><i class="fa fa-calendar"></i> Posted On: <?php echo e(tanggal_indo2($berita->tanggal)); ?></li>
                        <li><i class="fa fa-eye"></i> Dilihat: <?php echo e($berita->dibaca); ?> Kali</li>
                      </ul>
                  </div>
                  <div class="post-head" style="margin-top: 20px;">
                      <div class = "thumbnail">
                           <img width="100%" src = "<?php echo e(asset('berita/'.$berita->gambar)); ?>" class="img-responsive">
                           <div class = "caption"><?php echo e($berita->title_gambar); ?></div>
                      </div>
                      
                  </div>
                  <div class="post-isi">
                      <?php echo $berita->isi;?>
                      Berbagi ke Jejaring Sosial: <div class="share-it"></div>
                  </div>
            </div>       
            <p></p>
        </div>

        <div class="col-md-4">
            <div class="tabs-section latest-posts-classic">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-newspaper-o"></i>
                  Terbaru</a></li>
                  <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-bookmark-o"></i>Populer</a></li>
                </ul>

                 <div class="tab-content">
                       <div class="tab-pane fade in active" id="tab-1">

                          <?php
                              $berita_terbaru = DB::table('berita')->orderby('tanggal','desc')
                                                ->offset(0)->limit(5)->get();
                          ?>
                          <?php foreach($berita_terbaru as $bt): ?>
                          <?php
                              $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                          ?>
                          <div class="post-row item">
                            <div class="left-meta-post">
                              <div class="post-date"><span class="day"><?php echo e(get_tanggal($bt->tanggal)); ?></span><span class="month"><?php echo e(get_bulan($bt->tanggal)); ?></span></div>
                              <div class="post-type"><i class="fa fa-newspaper-o"></i></div>
                            </div>
                            <h4 class="post-title"><a href="<?php echo e($url); ?>"><?php echo e($bt->judul); ?></a></h4>
                            <div class="post-content">
                              <?php
                                $start = strpos($bt->isi, '<p>');
                                $end = strpos($bt->isi, '</p>', $start);
                                $paragraph = substr($bt->isi, $start, $end-$start+4);
                                $paragraph = str_replace("<p>", "",$paragraph);
                                $paragraph = gettextdeskripsi($paragraph);
                                $paragraph = strip_tags($paragraph);
                              ?>
                              <p><?php echo e($paragraph); ?>.. <a class="read-more" href="<?php echo e($url); ?>">Selengkapnya<i class="fa fa-angle-right"></i></a></p>
                            </div>
                          </div><br>
                          <?php endforeach; ?>
                       
                       </div>
                      <div class="tab-pane fade" id="tab-2">
                          <?php
                              $berita_populer = DB::table('berita')->orderby('dibaca','desc')
                                                ->offset(0)->limit(5)->get();
                          ?>
                          <?php foreach($berita_populer as $bt): ?>
                          <?php
                              $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                          ?>
                          <div class="post-row item">
                            <div class="left-meta-post">
                              <div class="post-date"><span class="day"><?php echo e(get_tanggal($bt->tanggal)); ?></span><span class="month"><?php echo e(get_bulan($bt->tanggal)); ?></span></div>
                              <div class="post-type"><i class="fa fa-newspaper-o"></i></div>
                            </div>
                            <h4 class="post-title"><a href="<?php echo e($url); ?>"><?php echo e($bt->judul); ?></a></h4>
                            <div class="post-content">
                              <?php
                                $start = strpos($bt->isi, '<p>');
                                $end = strpos($bt->isi, '</p>', $start);
                                $paragraph = substr($bt->isi, $start, $end-$start+4);
                                $paragraph = str_replace("<p>", "",$paragraph);
                                $paragraph = gettextdeskripsi($paragraph);
                                $paragraph = strip_tags($paragraph);
                              ?>
                              <p><?php echo e($paragraph); ?>.. <a class="read-more" href="<?php echo e($url); ?>">Selengkapnya <i class="fa fa-angle-right"></i></a></p>
                            </div>
                          </div><br>
                          <?php endforeach; ?>
                      </div>
                 </div>

            </div>
            <div style="margin-top: 20px;"></div>
            <p class="pull-right">
              <a href="<?php echo e(URL::to('semua-berita')); ?>"> Lihat Berita Lainnya <i class="fa fa-angle-right"></i></a>
            </p>
        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>