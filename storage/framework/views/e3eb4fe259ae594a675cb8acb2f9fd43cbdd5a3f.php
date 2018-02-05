<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Detail Profil Kelurahan/Desa</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/kelurahan")); ?>" data-rel="reload" class="btn btn-default btn-sm btn-outline"><i class="fa fa-angle-left"></i> Ke Index Kelurahan/Desa</a>
                  <a href="<?php echo e(URL::to("admin/kelurahan/edit/".$kelurahan->gethashid())); ?>" data-rel="reload" class="btn btn-success btn-sm  btn-outline"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <center>
                                <h4><?php echo e($kelurahan->nama); ?></h4>
                                <p><?=$kelurahan->alamat_kantor;?></p>
                                <hr>
                            </center>   
                            <div class="thumbnail">
                                <img  width="100%"  src="<?php echo e(asset($kelurahan->photo_lurah)); ?>">
                                <div class="caption">
                                    <center><b><?=$kelurahan->nama_lurah;?></b></center>
                                    <center>
                                        <?php if($kelurahan->tipe=='kelurahan'): ?>
                                        (Kepala Kelurahan)
                                        <?php else: ?>
                                        (Kepala Desa)
                                        <?php endif; ?>
                                    </center>
                                </div>
                            </div>                         
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h5>
                            <?php if($kelurahan->tipe=='kelurahan'): ?>
                            Pejabat Kelurahan
                            <?php else: ?>
                            Pejabat Desa
                            <?php endif; ?>
                        </h5>
                        <?php echo $kelurahan->pejabat_kelurahan; ?>

                        <hr>
                        <div class="thumbnail">
                            <img  width="100%"  src="<?php echo e(asset($kelurahan->photo_kantor)); ?>">
                            <div class="caption">
                                <center><b>Kantor <?php echo e($kelurahan->nama); ?></b></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>