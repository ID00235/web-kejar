<div class="row">
    <?php foreach($photo as $pt): ?>
    <div class="col-md-3 col-xs-6">
        <div class="thumbnail overlay">
            <img src="<?php echo e(asset('gallery/photo/thumb-'.$pt->filename)); ?>" alt="<?php echo e($pt->deskripsi); ?>" class="image" style="width:100%">
            <div class="middle">
                <center>
                    <a class="view-photo btn btn-sm btn-default" title="<?php echo e($pt->deskripsi); ?>" href="<?php echo e(asset('gallery/photo/'.$pt->filename)); ?>"><i class="fa fa-search-plus"></i></a>&nbsp;
                    <a class="btn-edit-photo btn btn-sm btn-success" data-id="<?php echo e($pt->gethashid()); ?>"><i class="fa fa-pencil"></i></a>&nbsp;
                    <a class="btn-delete-photo btn btn-sm btn-danger" data-id="<?php echo e($pt->gethashid()); ?>"><i class="fa fa-times"></i></a>
                </center>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php echo e($photo->cssClass('paging-photo')->links()); ?>

