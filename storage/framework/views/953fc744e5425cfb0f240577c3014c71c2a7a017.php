

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-bullhorn"></i> Detail Pengumuman</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to('admin/pengumuman')); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Ke Index Pengumuman</a>
                  <a href="<?php echo e(URL::to('admin/pengumuman/edit/'.$record->gethashid())); ?>" data-rel="reload" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <small>Di Posting: <i class="fa fa-calendar"></i> <?php echo e(timestamp_indo2($record->created_at)); ?></small>
                <h4><?php echo e($record->judul); ?></h4><br>
                <?php if($record->gambar): ?>
                <div class = "thumbnail">
                     <img width="100%" src = "<?php echo e(asset('berita/'.$record->gambar)); ?>" class="img-responsive">
                     <div class = "caption text-center"><p><?php echo e($record->title_gambar); ?></p></div>
                </div>
                <?php endif; ?>
                <?=$record->isi;?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>