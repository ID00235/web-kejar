<?php $__env->startSection("pagetitle","Permohonan Informasi"); ?>
<?php $__env->startSection("subtitle","Pengajuan Permohonan Informasi"); ?>
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
        	<h4 class="classic-title"><span>Formulir Permohonan Informasi</span></h4>
          <p>Mohon Mengisi Identitas Diri dan Rincian Permohonan Informasi Dengan Lengkap!</p>
          <?php
            $nama = old('nama') ? old('nama'):'';
            $nomor_identitas = old('nomor_identitas') ? old('nomor_identitas'):'';
            $alamat = old('alamat') ? old('alamat'):'';
            $pekerjaan = old('pekerjaan') ? old('pekerjaan'):'';
            $telepon = old('telepon') ? old('telepon'):'';
            $email = old('email') ? old('email'):'';
            $informasi_diperlukan = old('informasi_diperlukan') ? old('informasi_diperlukan'):'';
            $informasi_tujuan = old('informasi_tujuan') ? old('informasi_tujuan'):'';
            $cara_memperoleh =  old('cara_memperoleh') ? old('cara_memperoleh'):'';
            $cara_mendapatkan =  old('cara_mendapatkan') ? old('cara_mendapatkan'):'';
          ?>
        	<form role="form" class="contact-form" id="contact-form" method="post" action="<?php echo e(URL::to("permohonan/submitpermohonan")); ?>">
          <?php echo e(csrf_field()); ?>


            <h3 style="margin-bottom: 10px;"><b>A. Identitas Diri</b></h3>
              <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                  <label><b>Nama Pemohon</b></label>
                  <div class="controls">
                    <input type="text" name="nama"  value="<?php echo e($nama); ?>" placeholder="Masukan Nama Pemohon" 
                    <?php if($errors->has('nama')): ?> class="has-error" <?php endif; ?> >
                  </div>

              </div>
              <div class="form-group ">
                  <label>
                  <b>Nomor Identitas (KTP/SIM)</b>
                  </label>
                  <div class="controls ">
                    <input type="text" name="nomor_identitas" value="<?php echo e($nomor_identitas); ?>" 
                    placeholder="Masukan Nomor Identitas Pemohon"
                     <?php if($errors->has('nomor_identitas')): ?> class="has-error" <?php endif; ?> >
                  </div>
              </div>
              <div class="form-group">
                  <label><b>Alamat Pemohon</b></label>
                  <div class="controls">
                    <textarea name="alamat" placeholder="Masukan Alamat Pemohon"
                     <?php if($errors->has('alamat')): ?> class="has-error" <?php endif; ?>><?php echo e($alamat); ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label><b>Pekerjaan</b></label>
                  <div class="controls">
                    <input type="text" 
                    placeholder="Masukan Pekerjaan"
                    value="<?php echo e($pekerjaan); ?>" name="pekerjaan" <?php if($errors->has('pekerjaan')): ?> class="has-error" <?php endif; ?>>
                  </div>
              </div>
              <div class="form-group">
                  <label><b>Nomor Telepon</b></label>
                  <div class="controls">
                    <input type="text" placeholder="Masukan Nomor Telepon"
                    value="<?php echo e($telepon); ?>" name="telepon" <?php if($errors->has('telepon')): ?> class="has-error" <?php endif; ?>>
                  </div>
              </div>
              <div class="form-group">
                  <label><b>Alamat Email <small>Gunakan Email Yang Aktif</small></b></label>
                  <div class="controls">
                    <input type="text" placeholder="Masukan Alamat Email Aktif" value="<?php echo e($email); ?>"  name="email" <?php if($errors->has('email')): ?> class="has-error" <?php endif; ?>>
                  </div>
              </div>
              <p>&nbsp;</p>
              <h3 style="margin-bottom: 10px;"><b>B. Rincian Permohonan</b></h3>
              <div class="form-group">
                  <label><b>Informasi Yang Diperlukan</b></label>
                  <div class="controls">
                    <textarea  rows="5"  placeholder="Tuliskan Rincian Informasi Yang Diperlukan.." name="informasi_diperlukan" <?php if($errors->has('informasi_diperlukan')): ?> class="has-error" <?php endif; ?>><?php echo e($informasi_diperlukan); ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label><b>Tujuan Penggunaan Informasi</b></label>
                  <div class="controls">
                    <textarea  rows="5" placeholder="Tuliskan Tujuan Penggunan Informasi" name="informasi_tujuan" <?php if($errors->has('informasi_tujuan')): ?> class="has-error" <?php endif; ?>><?php echo e($informasi_tujuan); ?></textarea>
                  </div>
              </div>
              <p>&nbsp;</p>
               <h3 style="margin-bottom: 10px;"><b>C. Bagaimana Cara Memperoleh dan Mendapatkan Informasi</b></h3>
              <div class="form-group">
                <label> <b>Pilih Cara Memperoleh Informasi</b></label>
                <div class="controls">
                  <?php
                      $cara1 = DB::table('cara_memperoleh')->get();
                  ?>
                  <?php foreach($cara1 as $al): ?>
                    <label class="radio-inline"><input type="radio" name="cara_memperoleh" 
                    value="<?php echo e($al->nama); ?>" <?php if($cara_memperoleh==$al->nama): ?> checked="checked" <?php endif; ?> ><?php echo e($al->nama); ?></label><br>
                  <?php endforeach; ?>
                  <?php if($errors->has('cara_memperoleh')): ?>
                  <b style="color:#a24552 ;">Anda Belum Memilih Cara Memperoleh Informasi</b>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label><b>Pilih Cara Mendapatkan Informasi</b></label>
                <div class="controls">
                  <?php
                      $cara2 = DB::table('cara_mendapatkan')->get();
                  ?>
                  <?php foreach($cara2 as $al): ?>
                    <label class="radio-inline"><input type="radio" name="cara_mendapatkan" 
                    value="<?php echo e($al->nama); ?>" <?php if($cara_mendapatkan==$al->nama): ?> checked="checked" <?php endif; ?> ><?php echo e($al->nama); ?></label><br>
                  <?php endforeach; ?>
                  <?php if($errors->has('cara_mendapatkan')): ?>
                  <b style="color:#a24552 ;">Anda Belum Memilih Cara Mendapatkan Informasi</b>
                  <?php endif; ?>
                </div>
              </div>
              
              <div class="row">
                  <div class="controls">
                    <div class="col-md-3">
                         <p><?php echo Captcha::img('flat');?></p>
                    </div>
                    <div class="col-md-4">
                    <input type="text"  <?php if($errors->has('captcha')): ?> class="has-error" <?php endif; ?> 
                    value="" placeholder="Masukan Kode Captcha!" name="captcha" >
                    </div>                    
                  </div>
              </div>
              <p>&nbsp;</p>
              <button type="submit" id="submit" class="btn-system btn-lg"><i class="fa fa-send"></i> Kirim Permohononan</button>
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
            <p>&nbsp;</p>
            

          </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
      @parent
      <script type="text/javascript">
      $(function(){
          <?php if($errors->has()): ?>
            Notify.showAlert('Isian Formulir Permohonan Belum Lengkap!');
          <?php endif; ?>
      })
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>