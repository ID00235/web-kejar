<?php $__env->startSection("pagetitle","Beranda"); ?>

<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pageslider", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
	
             
      
      <!-- Start News & Skill Section -->
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-xs-12 hidden-xs">
                <img class="img img-responsive" src="<?php echo e(asset('images/pimda.png')); ?>" >
                <p class="hidden-xs">&nbsp;</p>
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu1.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Profil Kecamatan</span></h4>
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
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu2.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Kelurahan dan Desa</span></h4>
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
                <p class="hidden-xs">&nbsp;</p><hr class="hidden-lg">
              </div>
              <div class="col-lg-6 col-xs-12">
                <img class="img img-responsive" src="<?php echo e(asset('images/welcome.png')); ?>">
                <hr class="hidden-lg">
                <p class="hidden-xs">&nbsp;</p>
                <h4 class="classic-title"><span>Berita Terkini</span>
                <small class="pull-right"><a href="<?php echo e(url('semua-berita')); ?>">Semua Berita</a></small>
                </h4>
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
                              <small style="text-align: justify;" class="hidden-xs"><?php echo e(gettextdeskripsi($bt->isi)); ?> 
                              <br></small>
                              <small><i class="fa fa-calendar"></i> <?php echo e(tanggal_singkat_indo($bt->tanggal)); ?></small>
                            </div>
                        </div>
                      <?php endforeach; ?>
                </div>
                 <p class="hidden-xs">&nbsp;</p>
                 <div class="latest-posts-classic">
                    <h4 class="classic-title"><span>Agenda Kegiatan</span>
                    <small class="pull-right"><a href="<?php echo e(url('semua-agenda')); ?>">Semua Agenda</a></small>
                    </h4>
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
                <p class="hidden-md hidden-lg">&nbsp;</p>
                <p class="hidden-xs">&nbsp;</p>
                <h4 class="classic-title"><span>Gallery Photo Kegiatan</span>
                <small class="pull-right"><a href="<?php echo e(url('gallery-photo')); ?>">Semua Photo</a></small>
                </h4>
                <?php
                    $photo = DB::table('gallery_photo')->orderby('created_at','desc')->limit(6)->skip(0)->get();
                    ?>
                    <?php foreach($photo as $pt): ?>
                     <div class="col-md-6">
                        <a href="<?php echo e(URL::to('gallery/photo').'/'.$pt->filename); ?>" title="<?php echo e($pt->deskripsi); ?>" class="view-photo">
                            <span class="thumb-info thumb-info-lighten"> 
                                <span class="thumb-info-wrapper"> 
                                <div style="position:relative;height:0;padding-bottom:56.25%"> 
                                <img src="<?php echo e(URL::to('gallery/photo').'/thumb-'.$pt->filename); ?>" class="img-responsive" style="left:0;right:0;top:0;bottom:0"> 
                                    <span class="thumb-info-action"> 
                                        <span class="thumb-info-action-icon"><i class="fa fa-search-plus"></i></span> 
                                    </span> 
                                </div> 
                                </span> 
                            </span> 
                            <div style="height:50px"> 
                                <p style="text-align:center"><small><?php echo e(cuttext50($pt->deskripsi)); ?></small></p> 
                            </div> 
                        </a>    
                    </div>
                    <?php endforeach; ?>
                  <hr class="hidden-lg">
              </div>
              <div class="col-lg-3 col-xs-12 hidden-lg hidden-md">
                <img class="img img-responsive  hidden-xs" src="<?php echo e(asset('images/pimda.png')); ?>" >
                <p class="hidden-xs">&nbsp;</p>
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu1.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Profil Kecamatan</span></h4>
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
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu2.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Kelurahan dan Desa</span></h4>
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
                <p class="hidden-xs">&nbsp;</p><hr class="hidden-lg">
              </div>
              <div class="col-lg-3 col-xs-12">
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu3.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Data Umum</span></h4>
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
                <div class="sidemenu">
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/menu4.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Informasi</span></h4>
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
                    <p class="sidetitle">
                      <center><img src="<?php echo e(asset('images/link-menu.png')); ?>"  class="hidden-xs"></center>
                    </p>
                    <h4 class="classic-title hidden-lg hidden-md"><span>Website Terkait</span></h4>
                    <ul class="listlink">
                      <li>
                            <a href="http://www.batangharikab.go.id" target="_blank">www.batangharikab.go.id</a><br>
                            <small>Website Pemerintah Kab. Batang Hari</small>
                      </li>
                      <li>
                            <a href="http://dprd.batangharikab.go.id" target="_blank">dprd.batangharikab.go.id</a><br>
                            <small>Website DPRD Kab. Batang Hari</small>
                      </li>
                      <li>
                            <a href="http://ppid.batangharikab.go.id" target="_blank">ppid.batangharikab.go.id</a><br>
                            <small>PPID Kab. Batang Hari</small>
                      </li>
                      <li>
                            <a href="http://lpse.batangharikab.go.id" target="_blank">lpse.batangharikab.go.id</a><br>
                            <small>LPSE Kab. Batang Hari</small>
                      </li>
                      <li>
                            <a href="http://dukcapil.batangharikab.go.id" target="_blank">dukcapil.batangharikab.go.id</a><br>
                            <small>DUKCAPIL Kab. Batang Hari</small>
                      </li>
                    </ul>
                </div>
                <p class="hidden-xs">&nbsp;</p>
              </div>
          </div>
        <div class="hr1 margin-60"></div>
      </div>

    <?php $__env->startSection("javascript"); ?>
    @parent
    <script>
        $(function(){
            $('.view-photo').magnificPopup({
                type: 'image',
                image : {titleSrc: 'title'}
            });
            $('.view-video').magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/',
                            id: 'v=', 
                            src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                        }
                    }
                }
            });
        })
    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>