<?php $__env->startSection("pagetitle","Beranda"); ?>

<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pageslider", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
	
             
      
      <!-- Start News & Skill Section -->
      <div class="container">
          <div class="row">
              <div class="col-sm-8 col-xs-12" style="padding-right: 15px !important;">
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
              <div class="col-sm-4 col-xs-12" style="  padding-left: 20px !important; padding-right: 20 !important;">
                <?php echo $__env->make('frontend.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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