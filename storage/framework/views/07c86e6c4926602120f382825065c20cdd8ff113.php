<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-bullhorn"></i> Edit Pengumuman</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/pengumuman/")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Pengumuman</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $judul = old('judul') ? old('judul'):$record->judul;
                $isi = old('isi') ? old('isi'):$record->isi;
                $title_gambar = old('title_gambar') ? old('title_gambar'):$record->title_gambar;
            ?>
                <form action="<?php echo e(URL::to('admin/pengumuman/update/'.Crypt::encrypt($record->id))); ?>" method="POST"  enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('judul')): ?> has-error <?php endif; ?>">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul"  value="<?php echo e($judul); ?>" placeholder="Masukan Judul" type="text">
                                    <?php if($errors->has('judul')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('isi')): ?> has-error <?php endif; ?>">
                                    <label>Isi Pengumuman</label>
                                    <textarea id="editor" name="isi"><?php echo e($isi); ?></textarea>
                                    <?php if($errors->has('isi')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <?php if($record->gambar): ?>
                                <div class = "thumbnail">
                                     <img width="100%" src = "<?php echo e(asset('pengumuman/thumb.'.$record->gambar)); ?>" class="img-responsive">
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Caption Gambar (Optional)</label>
                                    <input class="form-control" name="title_gambar"  value="<?php echo e($title_gambar); ?>" placeholder="Masukan Caption Gambar" type="text">
                                </div>
                            </div>     
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('gambar')): ?> has-error <?php endif; ?>">
                                    <label>Ganti Gambar(optional) <small>*Resolusi disarankan 600x400 pixel</small></label>
                                    <?php if($errors->has('gambar')): ?> <small class="text-danger"><br><?php echo e($errors->first('gambar')); ?></small><?php endif; ?>
                                    <input  class="btn btn-default" type="file" name="gambar" accept=".png,.jpg,.bmp,.jpeg" />
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