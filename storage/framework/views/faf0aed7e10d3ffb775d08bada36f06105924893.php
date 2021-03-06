<?php $__env->startSection("pagetitle","Semua Berita"); ?>
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
            <h4 class=" classic-title"><span>Berita Terkini</span></h4>
            <div class="row">
                <?php foreach($berita as $bt): ?>
                <?php
                    $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                ?>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 15px;">
                    <div class="col-lg-2 col-xs-3" style="padding:5px;">
                      <img src="<?php echo e(asset('berita/thumb.'.$bt->gambar)); ?>" width="100%">
                    </div>
                    <div class="col-lg-10 col-xs-9">
                      <b class="media-heading"><a href="<?php echo e($url); ?>"><?php echo e(cuttext80($bt->judul)); ?></a></b><br>
                      <small style="text-align: justify;" class="hidden-xs"><?php echo e(gettextdeskripsi2($bt->isi)); ?> 
                      <br></small>
                      <small><i class="fa fa-calendar"></i> <?php echo e(tanggal_singkat_indo($bt->tanggal)); ?></small>
                    </div>  
                </div>
                <?php endforeach; ?>
                <center> <?php echo e($berita->links()); ?> </center>
                <p class="hidden-md hidden-lg">&nbsp;</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sidemenu">
                    <h4 class="classic-title"><span>Data Umum</span></h4>
                    <?php
                    $dataumum = DB::table('dataangka')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    <?php foreach($dataumum as $p): ?>
                      <?php
                              $url = URL::to("informasi/".$p->id."/".generate_url($p->nama));
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