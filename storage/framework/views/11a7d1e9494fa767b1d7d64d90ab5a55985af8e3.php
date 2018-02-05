
<?php $__env->startSection("pagetitle","Cek Status Permohonan Informasi"); ?>
<?php $__env->startSection("subtitle","Permohonan Informasi"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<?php
$setting = DB::table('setting')->first();
?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
        	<h4 class="classic-title"><span>Cek Status Permohonan Informasi</span></h4>
          <h5>Untuk memeriksa status permohonan informasi silahkan input nomor registrasi permohonan dan alamat email pemohon</h5>
          <p>&nbsp;</p>
          <?php if($errors->has()): ?>
             <span class="alert alert-danger alert-dismissable"> 
              <i class="fa fa-warning"></i> Informasi Permohonan Belum Lengkap!</span> <br><br>
          <?php endif; ?>
          <?php if(isset($notfound)): ?>
             <span class="alert alert-danger alert-dismissable"> 
              <i class="fa fa-warning"></i> Data Permohonan Tidak Ditemukan!</span> <br><br>
          <?php endif; ?>
          <?php
            $nomor = old('nomor') ? old('nomor'):'';
            $email = old('email') ? old('email'):'';
          ?>
        	<form role="form" class="contact-form" id="contact-form" method="post" action="<?php echo e(URL::to("permohonan/statuspermohonan/submit")); ?>">
          <?php echo e(csrf_field()); ?>

              <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                  <label>Nomor Pendaftaran Permohonan</label>
                  <div class="controls">
                    <input type="text" name="nomor"  value="<?php echo e($nomor); ?>" 
                    <?php if($errors->has('nomor')): ?> class="has-error" <?php endif; ?> >
                  </div>
              </div>              
              <div class="form-group">
                  <label>Alamat Email Pemohon</label>
                  <div class="controls">
                    <input type="text" value="<?php echo e($email); ?>"  name="email" <?php if($errors->has('email')): ?> class="has-error" <?php endif; ?>>
                  </div>
              </div>
              <div class="row">
                  <div class="controls">
                    <div class="col-md-3">
                        <p><?php echo Captcha::img('flat');?></p>
                    </div>
                    <div class="col-md-4">
                    <input type="text" class="col-md-3" value="" placeholder="Masukan Kode Captcha!" name="captcha" <?php if($errors->has('captcha')): ?> class="has-error" <?php endif; ?>>
                    </div>                    
                  </div>
              </div>
              
              <br>
              <button type="submit" id="submit" class="btn-system btn btn-lg"><i class="fa fa-search"></i> Proses</button>
              <div class="hidden-md hidden-sm hidden-lg"><hr></div>
            </form>
        </div>

        <div class="col-md-4">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Informasi Kontak</span></h4>

            <!-- Some Info -->
            <p>PPID Kabupaten Batang Hari</p>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:10px;"></div>

            <!-- Info - Icons List -->
            <ul class="icons-list">
              <li><i class="fa fa-globe">  </i> <strong>Alamat:</strong><br> <?php echo e($setting->alamat); ?></li>
              <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong><br> <?php echo e($setting->email); ?></li>
              <li><i class="fa fa-phone"></i> <strong>Phone:</strong><br> <?php echo e($setting->telepon); ?></li>
            </ul>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:15px;"></div>

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Jam Kerja</span></h4>

            <!-- Info - List -->
            <ul class="list-unstyled">
              <li><strong>Senin - Kamis</strong> :  07:30 - 16:00 WIB</li>
              <li><strong>Jum'at</strong> :  07:30 - 11:30 WIB</li>
            </ul>

          </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
      @parent
      <script type="text/javascript">
            $(function(){
                  
            })
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>