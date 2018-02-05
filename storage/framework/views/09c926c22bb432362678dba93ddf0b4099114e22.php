
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-info-circle"></i> Informasi Kontak</div>
            </div>
            <div class="panel-body">
            <?php
                $alamat = old('alamat') ? old('alamat'):$record->alamat;
                $telepon = old('telepon') ? old('telepon'):$record->telepon;
                $email = old('email') ? old('email'):$record->email;
                $email_reply = old('email_reply') ? old('email_reply'):$record->email_reply;
                $password = old('password') ? old('password'):$record->password;
                $facebook = old('facebook') ? old('facebook'):$record->facebook;
                $twitter = old('twitter') ? old('twitter'):$record->twitter;
            ?>
                <form action="<?php echo e(URL::to('admin/setting/update')); ?>" method="POST">
                        <fieldset>
                        <?php echo e(csrf_field()); ?>

                        <fieldset>      
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Alamat PPID</label>
                                    <textarea name="alamat" class="form-control"><?php echo e($alamat); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telepon/Fax </label>
                                    <input class="form-control" name="telepon"  value="<?php echo e($telepon); ?>" placeholder="Masukan Nomor Telepon/Fax"
                                     type="text">
                                </div>
                            </div>    
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email PPID </label>
                                    <input class="form-control" name="email"  value="<?php echo e($email); ?>" placeholder="Masukan Email PPID"
                                     type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Twitter </label>
                                    <input class="form-control" name="twitter"  value="<?php echo e($twitter); ?>" 
                                    placeholder="Masukan Alamat Akun Twitter"
                                     type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Facebook </label>
                                    <input class="form-control" name="facebook"  value="<?php echo e($facebook); ?>" 
                                    placeholder="Masukan Alamat Akun Facebook"
                                     type="text">
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