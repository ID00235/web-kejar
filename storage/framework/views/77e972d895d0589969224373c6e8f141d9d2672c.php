
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-user"></i> Edit Akun Pengguna</div>
            </div>
            <div class="panel-body">
            <?php
                $username = old('username') ? old('username'):$record->username;
                $nama = old('nama') ? old('nama'):$record->nama;
                $email = old('email') ? old('email'):$record->email;
            ?>
                <form action="<?php echo e(URL::to('admin/akun/update/'.Crypt::encrypt($record->id))); ?>" method="POST">
                        <fieldset>
                        <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" readonly="readonly" value="<?php echo e($username); ?>" 
                                     type="text">
                                </div>
                            </div>      
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                                    <label>Nama Pengguna (pemegang user)</label>
                                    <input class="form-control" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama Pengguna"
                                     type="text">
                                    <?php if($errors->has('nama')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Email Aktif </label>
                                    <input class="form-control" name="email"  value="<?php echo e($email); ?>" placeholder="Masukan Username"
                                     type="text">
                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi dengan Email yang Valid</span>
                                    <?php endif; ?>
                                </div>
                            </div>    
                            <div class="col-md-12">
                                <div class="checkbox">
                                  <label><input type="checkbox" value="1" id="ganti_password" name="ganti_password" <?php if(old('ganti_password')): ?> checked="checked" <?php endif; ?>>Ganti Password</label>
                                </div>
                            </div>
                            <div id="panel-password">
                                <div class="col-md-12">
                                    <div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
                                        <label>Password User</label>
                                        <input class="form-control" name="password"  placeholder="Masukan Password"
                                         type="password">
                                        <?php if($errors->has('password')): ?>
                                        <span class="help-block">Password Tidak Sesuai</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?php if($errors->has('password_confirmation')): ?> has-error <?php endif; ?>">
                                        <label>Konfirmasi Password User</label>
                                        <input class="form-control" name="password_confirmation" placeholder="Masukan Konfirmasi Password"
                                         type="password">
                                    </div>
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
            
            <?php if(Session::has('notice')): ?>
                Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
            <?php endif; ?>

            <?php if(!old('ganti_password')): ?> 
                $("#panel-password").hide();
            <?php endif; ?>
             $("#ganti_password").change(function() {
                if(this.checked) {
                   $("#panel-password").show();
                }else{
                    $("#panel-password").hide()
                }
            });
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>