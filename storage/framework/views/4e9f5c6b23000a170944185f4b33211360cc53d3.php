<div class="row">
    <div class="col-md-12">
        <ul>
    <?php foreach($agenda as $pt): ?>
        <li style="margin-bottom: 8px;">
            <b><?php echo e($pt->nama); ?></b><br>
            <?php echo e($pt->lokasi); ?>, 
            <?php if($pt->tanggal_selesai!='0000-00-00'): ?> 
                <?php echo e(tanggal_singkat_indo($pt->tanggal_mulai)); ?> s/d <?php echo e(tanggal_singkat_indo($pt->tanggal_selesai)); ?>

            <?php else: ?> 
                <?php echo e(tanggal_singkat_indo($pt->tanggal_mulai)); ?>

            <?php endif; ?>
            <div class="pull-right">
                <a class="btn-delete-agenda btn  btn-outline btn-xs btn-danger" data-id="<?php echo e($pt->gethashid()); ?>"><i class="fa fa-times"></i></a>
            </div>
        </li>
    <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php echo e($agenda->cssClass('paging-photo')->links()); ?>

