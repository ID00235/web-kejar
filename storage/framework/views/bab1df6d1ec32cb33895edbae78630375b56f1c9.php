<!-- Start Portfolio Section -->
      <div class="project">
        <div class="container">
          <!-- Start Recent Projects Carousel -->
          <div class="recent-projects">
            <h4 class="title"><a href="<?php echo e(URL::to("semua-berita")); ?>"><span>Berita Terkini </span><i class="fa fa-angle-right"></i></a></h4>
            <div class="projects-carousel touch-carousel">
            <?php foreach($berita_terbaru as $berita): ?>
            <?php
              $url = URL::to("baca/".$berita->id."/".generate_url($berita->judul)."/".$berita->tanggal);
            ?>
              <div class="portfolio-item item">
                <div class="portfolio-border">
                  <div class="portfolio-thumb">
                    <a href="<?php echo e($url); ?>">
                      <div class="thumb-overlay"></div>
                      <img alt="" src="<?php echo e(asset("berita/thumb.".$berita->gambar)); ?>" />
                    </a>
                  </div>
                  <div class="portfolio-details">
                    <a href="<?php echo e($url); ?>">
                      <h5><?php echo e(cuttext50($berita->judul)); ?></h5>
                      <span><small><i class="fa fa-calendar"></i> <?php echo e(tanggal_singkat_indo($berita->tanggal)); ?></small></span>
                    </a>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- End Recent Projects Carousel -->
          <p>&nbsp;</p>
          <a href="<?php echo e(URL::to("semua-berita")); ?>">Berita Lainnya <i class="fa fa-angle-right"></i></a> 
        </div>
        <!-- .container -->
      </div>
      <!-- End Portfolio Section -->