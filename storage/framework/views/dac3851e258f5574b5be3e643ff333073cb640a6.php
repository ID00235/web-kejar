<?php $__env->startSection("pagetitle","Agenda Kegiatan"); ?>
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
             <div class="latest-posts-classic">
                <h4 class="classic-title"><span>Agenda Kegiatan</span></h4>
                <?php
                  $agenda = DB::table('agenda')->orderby('tanggal_mulai','desc')->limit(5)->get();
                ?>
                <?php foreach($agenda as $pt): ?>
                <?php
                  $exp = explode(" ", tanggal_singkat_indo($pt->tanggal_mulai));
                ?>
                <div class="post-row item">
                  <div class="left-meta-post">
                    <div class="post-date">
                        <span class="day"><?php echo e($exp[0]); ?></span><span class="month"><?php echo e($exp[1]); ?></span>
                    </div>
                  </div>
                  <b><?php echo e($pt->nama); ?></b><br>
                  <small>
                      <?php echo e($pt->lokasi); ?>, 
                      <?php if($pt->tanggal_selesai!='0000-00-00'): ?> 
                          <?php echo e(tanggal_singkat_indo($pt->tanggal_mulai)); ?> - <?php echo e(tanggal_singkat_indo($pt->tanggal_selesai)); ?>

                      <?php else: ?> 
                          <?php echo e(tanggal_singkat_indo($pt->tanggal_mulai)); ?>

                      <?php endif; ?>
                  </small>
                </div>
                 <?php endforeach; ?>
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