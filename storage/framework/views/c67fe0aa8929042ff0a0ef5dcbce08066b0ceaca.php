<?php $__env->startSection("pagetitle","Konfirmasi Permohonan Informasi"); ?>
<?php $__env->startSection("subtitle","Pengajuan Permohonan Informasi"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
 <div class="container">
	<div class="page-content">
		<div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
			<h4 class="classic-title"><span>Konfirmasi Permohonan</span></h4>
            <!-- Call Action Button -->
            
            <!-- Call Action Text -->
            <blockquote> <h2 class="primary"><strong>Terima Kasih</strong> <?php echo e($permohonan->nama_pemohon); ?>,  <br>
            Permohonan  Informasi Anda Telah Terkirim. <br> <span style="color:#666 !important;">Segera Lakukan Konfirmasi Permohonan Melalui Email Anda</span><br> 
            </h2>
            <p id="status-email"> 
            Kami Telah Mengirimkan Email Konfirmasi Permohonan. <br>
            <span style="color:#ff2335 !important;">Agar Permohonan Informasi ini dapat diproses , Mohon Periksa Email Anda Untuk Melakukan Konfirmasi. <br></span> <small>Jika email konfirmasi tidak terdapat di Kotak Masuk Mohon periksa di kotak (Spam/Junk) email Anda</small>
            </p>
            </blockquote>
            
            <b>Berikut Detail Permohonan Anda:</b><br><br>
            <div class="col-md-4">Tanggal Permohonan</div>
            <div class="col-md-8"><?php echo e(tanggal_indo2($permohonan->tanggal)); ?></div> <br>
            <div class="col-md-4">Email Pemohon</div>
            <div class="col-md-8"><b><?php echo e($permohonan->email); ?></b></div><br>
            <div class="col-md-4">Informasi Yang Diperlukan</div>
            <div class="col-md-8"><i><?php echo e($permohonan->informasi_diperlukan); ?></i> </div>
            <p class="text-center">
                   <img src="<?php echo e(asset("generate-qrcode/permohonan/".Hashids::encode($permohonan->id))); ?>" > <br>
                   <small>*Scan QRCode untuk melihat status permohonan</small>
            </p>
            <div class="hidden-md hidden-lg hidden-sm">
            <p class="text-center">
            <br>
            
            <br>
            </p>
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