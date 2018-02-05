<?php $__env->startSection("pagetitle",$berita->judul); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pageberita", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                  <div class="post-content">
                      <h4><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($berita->judul); ?></span></a></h4>
                      <ul class="post-meta" style="font-size: 0.86em !important;">
                        <li><i class="fa fa-calendar"></i> Diposting Pada <?php echo e(tanggal_indo2($berita->tanggal)); ?></li>
                        <li><i class="fa fa-eye"></i> Dibaca: <?php echo e($berita->dibaca); ?> Kali</li>
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
                      
                  </div>
            </div>       
            <p></p>
        </div>
        <div class="col-md-4">
            <div class="sidemenu">
              <h4 class="classic-title"><span>Berita Lainnya</span></h4>
              <ul class="listnews">
                 <?php
                 $id = $berita->id;
                 $upnews = DB::table('berita')->select('judul','id','tanggal')
                          ->where('id','>', $id)->orderby('id','desc')->limit(4)->get();
                 $downnews = DB::table('berita')->select('judul','id','tanggal')
                          ->where('id','<', $id)->orderby('id','desc')->limit(4)->get();
                 ?>
                <?php foreach($upnews as $bt): ?>
                      <?php
                           $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                      ?>
                  <li>
                    <a href="<?php echo e($url); ?>"><?php echo e($bt->judul); ?></a><br>
                    <small><?php echo e(tanggal_Singkat_indo($bt->tanggal)); ?></small>
                  </li>
                <?php endforeach; ?>

                <?php foreach($downnews as $bt): ?>
                      <?php
                           $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                      ?>
                  <li>
                    <a href="<?php echo e($url); ?>"><?php echo e($bt->judul); ?></a><br>
                    <small><?php echo e(tanggal_Singkat_indo($bt->tanggal)); ?></small>
                  </li>
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

            <div class="sidemenu">
                    <h4 class="classic-title"><span>Profil Kecamatan</span></h4>
                    <?php
                      $profil = DB::table('profil')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    <?php foreach($profil as $p): ?>
                      <?php
                              $url = URL::to("profil/".$p->id."/".generate_url($p->nama));
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