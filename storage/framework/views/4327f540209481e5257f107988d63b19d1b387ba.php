
<?php $__env->startSection("pagetitle","Gallery Photo"); ?>
<?php $__env->startSection("subpage","PPID Kabupaten Batang Hari"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<?php
$setting = DB::table('setting')->first();
?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">

        <div class="col-md-12">
        <p class="pull-right">
          <a href="<?php echo e(URL::to('semua-video')); ?>" class="btn btn-cyan"><i class="fa fa-arrow-circle-right"></i> Gallery Video</a>
        </p><br>
        	<h4 class="classic-title"><span>Gallery Photo</span></h4>
            <?php foreach($photo as $pt): ?>
             <div class="col-md-3">
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
                        <p style="text-align:center"><?php echo e(cuttext50($pt->deskripsi)); ?></p> 
                    </div> 
                </a>    
            </div>
            <?php endforeach; ?>
            <div class="col-md-12">
            <?php echo e($photo->links()); ?>

            </div>
            <p>&nbsp;</p>
        </div>
 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
      @parent
      <script type="text/javascript">
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
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>