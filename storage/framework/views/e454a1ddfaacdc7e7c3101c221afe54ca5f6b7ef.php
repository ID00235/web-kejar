<?php $__env->startSection("pagetitle","Semua Berita PPID Kabupaten Batang Hari"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pageberita", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <h4 class="classic-title"><span>Berita Terkini</span></h4>
                <?php foreach($berita as $bt): ?>
                <?php
                    $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                ?>
                <div class="row">
                  <div class="col-md-4">
                      <div class = "thumbnail">
                         <img width="100%" src = "<?php echo e(asset('berita/thumb.'.$bt->gambar)); ?>" class="img-responsive">
                      </div>
                  </div>  
                  <div class="col-md-8">
                      <h2><a href="<?php echo e($url); ?>"><span><?php echo e(cuttext50($bt->judul)); ?></span></a></h2>
                      <ul class="post-meta">
                        <li><i class="fa fa-calendar"></i> Posted On: <?php echo e(tanggal_indo2($bt->tanggal)); ?></li>
                        <li><i class="fa fa-eye"></i> Dilihat: <?php echo e($bt->dibaca); ?> Kali</li>
                      </ul>
                      <?php
                                $start = strpos($bt->isi, '<p>');
                                $end = strpos($bt->isi, '</p>', $start);
                                $paragraph = substr($bt->isi, $start, $end-$start+4);
                                $paragraph = str_replace("<p>", "",$paragraph);
                                $paragraph = strip_tags($paragraph);
                                $paragraph = gettextdeskripsi($paragraph);
                                $paragraph = strip_tags($paragraph);
                              ?>
                      <p><?php echo e($paragraph); ?>.. <a class="read-more" href="<?php echo e($url); ?>">Selengkapnya<i class="fa fa-angle-right"></i></a></p><br>
                  </div>  
                </div>
                <?php endforeach; ?>
                <center> <?php echo e($berita->links()); ?> </center>
                <p class="hidden-md hidden-lg">&nbsp;</p>
            </div>       
           
        <div class="col-md-4">
            <div class="latest-posts-classic">
              <h4 class="classic-title"><span>Populer</span></h4>
                <?php
                    $berita_populer = DB::table('berita')->orderby('dibaca','desc')
                                      ->offset(0)->limit(8)->get();
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
                      $paragraph = cuttext120($paragraph);
                      $paragraph = gettextdeskripsi($paragraph);
                      $paragraph = strip_tags($paragraph);
                    ?>
                    <p><?php echo e($paragraph); ?><a class="read-more" href="<?php echo e($url); ?>">Selengkapnya..<i class="fa fa-angle-right"></i></a></p>
                  </div>
                </div><br>
                <?php endforeach; ?>

            </div>

        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>