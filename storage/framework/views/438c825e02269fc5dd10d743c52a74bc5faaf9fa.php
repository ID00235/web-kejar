<?php $__env->startSection("pagetitle","Status Permohonan Informasi"); ?>
<?php $__env->startSection("subtitle","Permohonan Informasi"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
 <?php
    $status=array(
    "1"=>"<span class='label label-gray'>Belum diproses</span>",
    "2"=>"<span class='label label-danger'>Ditolak</span>",
    "3"=>"<span class='label label-default'>Klarifikasi</span>",
    "4"=>"<span class='label label-info'>Sedang Diproses</span>",
    "5"=>"<span class='label label-success'>Proses Selesai</span>",
    );
?>
 <div class="container">
	<div class="page-content">
            <div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
                  <?php
                        $proses = DB::table('proses_permohonan')->whereRaw('status < 99' )->where('permohonan',$permohonan->id)->orderby('updated_at','desc')->get();
                  ?>
                  <h4 class="classic-title"><span>Status Permohonan Informasi</span></h4>
                  <ul>
                  <?php foreach($proses as $ps): ?>
                      <li class="list-group-item">
                          <small><i class="fa fa-calendar"></i> <?php echo e(timestamp_indo($ps->updated_at)); ?></small>
                          <span class="pull-right"><?php echo $status[$ps->status];?></span>
                          <blockquote style="margin-top: 10px;"><?php echo $ps->isi;?></blockquote>
                      </li>
                  <?php endforeach; ?>
                  <?php if(!count($proses)): ?>
                        <li class="list-group-item">
                          <blockquote style="margin-top: 10px;"> Permohonan Informasi Belum di Konfirmasi!</blockquote>
                      </li>
                  <?php endif; ?>
                  </ul>
            </div>
            <p>&nbsp;</p>
		<div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
      		<h4 class="classic-title"><span>Detail Permohonan</span></h4>
                  <div class="col-md-4">Nomor Permohonan</div>
                  <div class="col-md-8"><?php echo e($permohonan->nomor); ?></div> <br>
                  <div class="col-md-4">Nama Pemohon</div>
                  <div class="col-md-8"><?php echo e($permohonan->nama_pemohon); ?></div> <br>
                  <div class="col-md-4">Tanggal Permohonan</div>
                  <div class="col-md-8"><?php echo e(tanggal_indo2($permohonan->tanggal)); ?></div> <br>
                  <div class="col-md-4">Email Permohonan</div>
                  <div class="col-md-8"><b><?php echo e($permohonan->email); ?></b></div><br>
                  <div class="col-md-4">Informasi Yang Diperlukan</div>
                  <div class="col-md-8"><i><?php echo e($permohonan->informasi_diperlukan); ?></i> </div>
                  <?php
            	$url_cetak = URL::to("/permohonan/cetak-permohonan")."/".Crypt::encrypt($permohonan->id);
            ?>
            <p>&nbsp;</p>
            <center>
            <a href="<?php echo e($url_cetak); ?>" class="btn btn-cyan btn-sm"><i class="fa fa-file-pdf-o"></i> Cetak Permohonan</a><br>
            </center>
            </div>
	</div>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>