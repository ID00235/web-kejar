
<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-plus"></i> Tambah Jenis Informasi</div>
					<div class="panel-options">
						<a href="<?php echo e(URL::to("admin/referensi/jenisinformasi")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Jenis Informasi</a>
					</div>
				</div>
  				<div class="panel-body">
  					<form action="<?php echo e(URL::to('admin/referensi/jenisinformasi/insert')); ?>" method="post">
  						<?php echo e(csrf_field()); ?>

						<fieldset>
							<div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
								<label>Nama</label>
								<?php if($errors->has('nama')): ?> <small class="text-danger"><br><?php echo e($errors->first('nama')); ?></small> <?php endif; ?>
								<input class="form-control" name="nama" placeholder="Masukan Nama Jenis Informasi" type="text">
							</div>
						</fieldset>
						<div>
							<button class="btn btn-success btn-sm" type="submit">
								<i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</form>
  				</div>
  			</div>
        </div>
    </div>
    <script type="text/javascript">
		$(function(){
		     <?php if($errors->has()): ?>
		    	Notify.showAlert('<b>Terjadi Kesalahan</b>,  Periksa Inputan Form');
		     <?php endif; ?>
		})
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>