<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-plus"></i> Halaman Berita Baru</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/berita/")); ?>" data-rel="reload" class="btn btn-default btn-sm btn-outline"><i class="fa fa-angle-left"></i> Index Berita</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $judul = old('judul') ? old('judul'):"";
                $isi = old('isi') ? old('isi'):"";
                $tanggal = old('tanggal') ? old('tanggal'):"";
                $title_gambar = old('title_gambar') ? old('title_gambar'):"";
            ?>
                
                <form action="<?php echo e(URL::to('admin/berita/insert')); ?>" method="POST" enctype="multipart/form-data">
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
                                    <label>Isi Berita</label>
                                    <textarea id="editor" name="isi"><?php echo e($isi); ?></textarea>
                                    <?php if($errors->has('isi')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('tanggal')): ?> has-error <?php endif; ?>">
                                    <label>Tanggal Posting</label>
                                    <input class="date-input form-control"  value="<?php echo e($tanggal); ?>" name="tanggal" placeholder="Tanggal Posting" type="text">
                                    <?php if($errors->has('tanggal')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('gambar')): ?> has-error <?php endif; ?>">
                                    <label>Pilih File Gambar (<small>Resolusi disarankan 600x400 pixel</small>)</label>
                                    <?php if($errors->has('gambar')): ?> <small class="text-danger"><br><?php echo e($errors->first('gambar')); ?></small><?php endif; ?>
                                    <input  class="btn btn-default" type="file" name="gambar" accept=".png,.jpg,.bmp,.jpeg" />
                                    <?php if($errors->has('gambar')): ?>
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    <?php endif; ?>
                                </div>
                            </div>     
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Caption Gambar (Optional)</label>
                                    <input class="form-control" name="title_gambar"  value="<?php echo e($title_gambar); ?>" placeholder="Masukan Caption Gambar" type="text">
                                </div>
                            </div>       
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-outline btn-sm" type="submit">
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
                extraPlugins: 'image2,justify',
                filebrowserImageUploadUrl: '<?php echo e(URL::to('admin/upload-gambar')); ?>',
             });
            
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>