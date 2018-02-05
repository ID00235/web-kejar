
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-bank"></i> Tambahkan PPID Pembantu</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/ppidpembantu/")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index PPID Pembantu</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):"";
                $alamat = old('alamat') ? old('alamat'):"";
                $email = old('email') ? old('email'):"";
                $website = old('website') ? old('website'):"";
                $telepon = old('telepon') ? old('telepon'):"";
                $kontak_person = old('kontak_person') ? old('kontak_person'):"";

            ?>
                <form action="<?php echo e(URL::to('admin/ppidpembantu/store')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        Isian Data Informasi PPID Pembantu
                        <hr>
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama PPID Pembantu" type="text">
                                    <?php if($errors->has('nama')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('alamat')): ?> has-error <?php endif; ?>">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat"  value="<?php echo e($alamat); ?>" 
                                    placeholder="Masukan Alamat" type="text">
                                    <?php if($errors->has('alamat')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Email Resmi</label>
                                    <input class="form-control"  value="<?php echo e($email); ?>" name="email" placeholder="Masukan Alamat Email" type="text">
                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">Alamat Harus diisi dengan benar</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('telepon')): ?> has-error <?php endif; ?>">
                                    <label>Nomor Telepon (Optional)</label>
                                    <input class="form-control"  value="<?php echo e($telepon); ?>" name="telepon" placeholder="Nomor Telepon" type="text">
                                    <?php if($errors->has('tanggal')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('website')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Website (Optional)</label>
                                    <input class="form-control" name="website"  value="<?php echo e($website); ?>" placeholder="Masukan Alamat Website" type="text">
                                    <?php if($errors->has('website')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('kontak_person')): ?> has-error <?php endif; ?>">
                                    <label>Kontak Person (Optional)</label>
                                    <input class="form-control" name="kontak_person"  value="<?php echo e($kontak_person); ?>" placeholder="Masukan Kontak Person PPID Pembantu" type="text">
                                    <?php if($errors->has('kontak_person')): ?>
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
            
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>