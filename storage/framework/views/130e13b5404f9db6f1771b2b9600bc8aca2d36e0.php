<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
$direktori  = $dokumen->nomor;
?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-pencil"></i> Edit Informasi Publik</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/dip")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Ke Daftar Informasi Publik</a>
                </div>
            </div>
            <div class="panel-body">
                <?php
                $_nama = old('nama') ? old('nama'):$dokumen->nama;
                $_kandungan_informasi = old('kandungan_informasi') ? old('kandungan_informasi'):$dokumen->kandungan_informasi;
                $_tanggal = old('tanggal') ? old('tanggal'):tanggalIndo($dokumen->tanggal);
                $_jenis = old('jenis') ? old('jenis'):$dokumen->jenis;
                $_kategori = old('kategori')? old('kategori'):$dokumen->kategori;
                $_penerbit = old('penerbit')? old('penerbit'):$dokumen->penerbit;
                

            ?>
                <form action="<?php echo e(URL::to('admin/dip/update/'.Crypt::encrypt($dokumen->id))); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    Ubah Isian Data Dokumen Informasi Publik
                    <hr>
                    <fieldset>
                        <div class="col-md-12">
                            <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                <label>Nama</label>
                                <input class="form-control" name="nama"  value="<?php echo e($_nama); ?>" placeholder="Masukan Nama Dokumen" type="text">
                                <?php if($errors->has('nama')): ?>
                                <span class="help-block">Kolom Ini Harus Diisi</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php if($errors->has('kandungan_informasi')): ?> has-error <?php endif; ?>">
                                <label>Deskripsi Informasi</label>
                                <textarea id="editor" class="form-control" name="kandungan_informasi" placeholder="Masukan Kandungan Informasi Dokumen" ><?php echo e($_kandungan_informasi); ?></textarea>
                                <?php if($errors->has('kandungan_informasi')): ?>
                                <span class="help-block">Kolom Ini Harus Diisi</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php if($errors->has('jenis')): ?> has-error <?php endif; ?>">
                                <label>Jenis Informasi</label>
                                <select class="form-control select2" name="jenis">
                                    <option value=""></option>
                                    <?php foreach($jenis as $k): ?>
                                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if($errors->has('jenis')): ?>
                                <span class="help-block">Kolom Ini Harus Diisi</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php if($errors->has('kategori')): ?> has-error <?php endif; ?>">
                                <label>Kategori Informasi</label>
                                <select class="form-control select2" name="kategori">
                                    <option value=""></option>
                                    <?php foreach($kategori as $k): ?>
                                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if($errors->has('kategori')): ?>
                                <span class="help-block">Kolom Ini Harus Diisi</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php if($errors->has('tanggal')): ?> has-error <?php endif; ?>">
                                <label>Tanggal Dokumen</label>
                                <input class="date-input form-control"  value="<?php echo e($_tanggal); ?>" name="tanggal" placeholder="Tanggal Publikasi Dokumen" type="text">
                                <?php if($errors->has('tanggal')): ?>
                                <span class="help-block">Kolom Ini Harus Diisi</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php if($errors->has('penerbit')): ?> has-error <?php endif; ?>">
                                <label>Penerbit Dokumen</label>
                                <input class="form-control"  value="<?php echo e($_penerbit); ?>" name="penerbit" placeholder="Badan Publik Penerbit Dokumen" type="text">
                                <?php if($errors->has('penerbit')): ?>
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
<form action="<?php echo e(URL::to('admin/dip/filedokumen/delete')); ?>" method="post" id="form-delete">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="id_file"  id="post_id">
<form>
<script type="text/javascript">
    $(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>

         <?php if($errors->has()): ?>
            Notify.showAlert('Terjadi Kesalahan Periksa Form Inputan');
         <?php endif; ?>
           $(".select2[name=jenis]").val("<?php echo e($_jenis); ?>");
          $(".select2[name=kategori]").val("<?php echo e($_kategori); ?>");
          

          CKEDITOR.replace( 'editor', {
                extraPlugins: 'image2',
                filebrowserImageUploadUrl: '<?php echo e(URL::to('admin/upload-gambar')); ?>',
             });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>