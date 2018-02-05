
<?php $__env->startSection("pagetitle","PPID Pembantu"); ?>
<?php $__env->startSection("subpage","Daftar PPID Pembantu Kabupaten Batang Hari"); ?>
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
        	<h4 class="classic-title"><span>Daftar PPID Pembantu</span></h4>
            <?php
            $ppid_pembantu = DB::table('ppid_pembantu')->get();
            ?>
            <ul class="icons-list">
                <?php foreach($ppid_pembantu as $pp): ?>
                <li><i class="fa fa-institution"></i><strong><?php echo e($pp->nama); ?></strong>
                    <br><?php echo e($pp->alamat); ?>

                    <br>Telepon: <?php echo e($pp->telepon); ?> <?php if(!$pp->telepon): ?> - <?php endif; ?>
                    <br>Email: <?php echo e($pp->email); ?> | Website: 
                    <?php if($pp->website): ?> <a href="<?php echo e($pp->website); ?>"><?php echo e($pp->website); ?></a> <?php else: ?>  - <?php endif; ?><br>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="col-md-4 hidden-xs">
            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Kontak PPID Kab. Batang Hari</span></h4>
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
          <?php if($errors->has()): ?>
            Notify.showAlert('Isian Formulir Permohonan Belum Lengkap!');
          <?php endif; ?>
      })
      </script>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>