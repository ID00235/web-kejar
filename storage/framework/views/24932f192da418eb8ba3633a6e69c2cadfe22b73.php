<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-photo"></i> Upload Header Baru</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/header")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Header</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):"";
                $kutipan = old('kutipan') ? old('kutipan'):"";
            ?>
                <form action="<?php echo e(URL::to('admin/header/store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama Header</label>
                                    <input class="form-control" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama " type="text">
                                    <?php if($errors->has('nama')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('file')): ?> has-error <?php endif; ?>">
                                    <label>Pilih File Gambar (<small>Resolusi yang disarankan 1360x240 Pixel Ukuran Max 1M</small>)</label>
                                    <?php if($errors->has('filename')): ?> <small class="text-danger"><br><?php echo e($errors->first('upload')); ?></small><?php endif; ?>
                                    <input  class="btn btn-default" type="file" name="file" accept=".png, .gif, .jpeg, .jpg" />
                                    <?php if($errors->has('file')): ?>
                                    <span class="help-block">File Tidak Dapat Diupload!</span>
                                    <?php endif; ?>
                                </div>
                            </div>                                        
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-paper-plane"></i>
                                    Upload
                                </button>
                            </div>
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