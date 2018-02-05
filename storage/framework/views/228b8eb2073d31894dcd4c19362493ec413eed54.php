<div class="row">
    <?php foreach($video as $pt): ?>
    <div class="col-md-3 col-xs-6">
        <div class="thumbnail overlay">
            <img src="http://img.youtube.com/vi/<?php echo e($pt->embed_id); ?>/hqdefault.jpg" alt="<?php echo e($pt->judul); ?>" class="image" style="width:100%">
            <div class="middle">
                <center>
                    <a  class="view-video btn btn-sm btn-default" href="https://www.youtube.com/watch?v=<?php echo e($pt->embed_id); ?>"><i class="fa fa-play"></i></a>&nbsp;
                    <a  class="btn-edit-video btn btn-sm btn-success" data-id="<?php echo e($pt->gethashid()); ?>"><i class="fa fa-pencil"></i></a>&nbsp;
                    <a  class="btn-delete-video btn btn-sm btn-danger" data-id="<?php echo e($pt->gethashid()); ?>"><i class="fa fa-times"></i></a>
                </center>
            </div>
            <div class="caption">
                <?php echo e(cuttext30($pt->judul)); ?>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php echo e($video->cssClass('paging-video')->links()); ?>


