<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-bank"></i> Edit Informasi Profil PPID</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/profil/")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index profil</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):$record->nama;
                $isi = old('isi') ? old('isi'):$record->isi;
            ?>
                <form action="<?php echo e(URL::to('admin/profil/update/'.Crypt::encrypt($record->id))); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        Isian profil
                        <hr>
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama Profil</label>
                                    <input class="form-control" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama Profil" type="text">
                                    <?php if($errors->has('nama')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('isi')): ?> has-error <?php endif; ?>">
                                    <label>Isi/Deskripsi</label>
                                    <textarea id="editor" name="isi"><?php echo e($isi); ?></textarea>
                                    <?php if($errors->has('isi')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>                     
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-save"></i>
                                    Simpan
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
             CKEDITOR.replace( 'editor', {
                extraPlugins: 'image2',
                filebrowserImageUploadUrl: '<?php echo e(URL::to('admin/upload-gambar')); ?>',
             });
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>