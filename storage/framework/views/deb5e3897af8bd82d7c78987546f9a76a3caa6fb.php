<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Edit Halaman Kelurahan/Desa</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/kelurahan/")); ?>" data-rel="reload" class="btn btn-outline btn-default btn-sm"><i class="fa fa-angle-left"></i> Kembali Ke Index</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):$record->nama;
                $tipe = old('tipe') ? old('tipe'):$record->tipe;
                $alamat_kantor = old('alamat_kantor') ? old('alamat_kantor'):$record->alamat_kantor;
                $nama_lurah = old('nama_lurah') ? old('nama_lurah'):$record->nama_lurah;
                $pejabat_kelurahan = old('pejabat_kelurahan') ? old('pejabat_kelurahan'):$record->pejabat_kelurahan;
            ?>
               <form action="<?php echo e(URL::to('admin/kelurahan/update/'.Crypt::encrypt($record->id))); ?>)}}" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <fieldset>

                             <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Jenis Kelurahan Atau Desa</label> <br>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipe" <?php if($tipe=='kelurahan'): ?> checked="checked"  <?php endif; ?> value="kelurahan"> Kelurahan
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipe" <?php if($tipe=='desa'): ?>  checked="checked"  <?php endif; ?> value="desa"> Desa
                                    </label>
                                    <?php if($errors->has('tipe')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama Kelurahan" 
                                    type="text">
                                    <?php if($errors->has('nama')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Kantor</label>
                                    <input class="form-control" name="alamat_kantor"  value="<?php echo e($alamat_kantor); ?>" placeholder="Masukan Alamat Kantor Kelurahan" 
                                    type="text">
                                    <?php if($errors->has('alamat_kantor')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('gambar')): ?> has-error <?php endif; ?>">
                                    <label>Ganti Photo Kantor Lurah/Desa (<small>Resolusi disarankan 640px x 480px</small>)</label>
                                    <?php if($errors->has('photo_kantor')): ?> <small class="text-danger"><br><?php echo e($errors->first('photo_kantor')); ?></small><?php endif; ?>
                                    <input  class="btn btn-default" type="file" name="photo_kantor" accept=".png,.jpg,.bmp,.jpeg" />
                                    <?php if($errors->has('photo_kantor')): ?>
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    <?php endif; ?>
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama Lurah/Kades</label>
                                    <input class="form-control" name="nama_lurah"  value="<?php echo e($nama_lurah); ?>" placeholder="Masukan Nama Pejabat Lurah" 
                                    type="text">
                                    <?php if($errors->has('nama_lurah')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('gambar')): ?> has-error <?php endif; ?>">
                                    <label>Ganti Photo Lurah/Kades (<small>Resolusi disarankan 170px × 255px</small>)</label>
                                    <?php if($errors->has('photo_lurah')): ?> <small class="text-danger"><br><?php echo e($errors->first('photo_lurah')); ?></small><?php endif; ?>
                                    <input  class="btn btn-default" type="file" name="photo_lurah" accept=".png,.jpg,.bmp,.jpeg" />
                                    <?php if($errors->has('photo_lurah')): ?>
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    <?php endif; ?>
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('isi')): ?> has-error <?php endif; ?>">
                                    <label>Pejabat Kelurahan/Desa</label>
                                    <textarea id="editor" name="pejabat_kelurahan"><?php echo e($pejabat_kelurahan); ?></textarea>
                                    <?php if($errors->has('pejabat_kelurahan')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>     
                                            
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm btn-outline" type="submit">
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