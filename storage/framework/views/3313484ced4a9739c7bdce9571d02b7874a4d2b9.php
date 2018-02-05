
<?php $__env->startSection("pagetitle","Daftar Informasi"); ?>
<?php $__env->startSection("subtitle","Daftar Informasi Publik"); ?>
<?php $__env->startSection("subpage","Daftar Informasi Publik Berdasarkan Jenis Informasi"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagetop", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <h4 class="classic-title"><span>Dokumen Informasi Publik</span></h4>
                <table class="table noborder table-condensed">
                  <tr>
                    <td colspan="2">
                        Berdasarkan Jenis Informasi : <br>
                        <b><?php echo e($keyword); ?> </b>
                    </td>
                  </tr>
                  <?php foreach($dokumen as $dip): ?>
                    <tr>
                      <td style="width:10px">
                        <a href="<?php echo e(URL::to("daftarinformasi/detail/".$dip->nomor)); ?>"><i class="icon icon-dokumen"></i></a>
                      </td>
                      <td align="left">
                        <b><a href="<?php echo e(URL::to("daftarinformasi/detail/".$dip->nomor)); ?>"><?php echo e($dip->nama); ?></a></b> <br>
                        <small><?php echo e($dip->penerbit); ?> (<?php echo e(tanggal_indo2($dip->tanggal)); ?>)</small> <br>
                        <small>
                        <i class="fa fa-folder-o"></i> <?php echo e($dip->getkategori->nama); ?> | <?php echo e($dip->getjenis->nama); ?> 
                        </small>             
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php if(!count($dokumen)): ?>
                    <tr>
                      <td colspan="2">
                          <br><br>
                          <span class="alert alert-warning">Dokumen Tidak Ditemukan..</span>
                      </td>
                    </tr>
                  <?php endif; ?>
                </table>
                <center> <?php echo e($dokumen->links()); ?> </center>
                <p class="hidden-md hidden-lg">&nbsp;</p>
        </div>       
           
        <div class="col-md-4">
            <h4 class="classic-title"><span>Kategori Informasi</span></h4>
            <div class="latest-posts-classic" style="background: url(images/folder.png)  no-repeat right bottom;">
              <?php
              $rekap_kategori = DB::select("SELECT kategori_informasi.id as id, kategori_informasi.nama as nama, count(dokumen.id) as jumlah FROM `kategori_informasi` left join dokumen on kategori_informasi.id = dokumen.kategori group by kategori_informasi.id");
              ?>
                  <?php foreach($rekap_kategori as $rk): ?>
                   <div class="post-row">
                      <div class="left-meta-post">
                        <div class="post-type hidden-xs"><i class="fa fa-file-text-o"></i></div>
                        <i class="fa fa-file-text-o hidden-md hidden-sm hidden-lg"></i>
                      </div>
                      <h5 class="post-title"><a href="<?php echo e(URL::to("daftarinformasi/kategori/".$rk->id."/".generate_url($rk->nama))); ?>">
                      <?php echo e($rk->nama); ?></a></h5>
                      <div class="post-content">
                        <p class="hidden-xs"><?php echo e($rk->jumlah); ?> Dokumen</p>
                      </div>
                    </div>
                  <?php endforeach; ?>
             </div>
             <p>&nbsp;</p>
             <?php
             $rekap_jenis = DB::select("SELECT jenis_informasi.id as id, jenis_informasi.nama as nama, count(dokumen.id) as jumlah FROM `jenis_informasi` left join dokumen on jenis_informasi.id = dokumen.jenis group by jenis_informasi.id");
             ?>
            <h4 class="classic-title"><span>Jenis Informasi</span></h4>
            <div class="sidebar ">
              <div class="tagcloud">
                 <?php foreach($rekap_jenis as $rp): ?>
                    <a href="<?php echo e(URL::to("daftarinformasi/jenis/".$rp->id."/".generate_url($rp->nama))); ?>">
                          <i class="fa fa-folder-o"></i> 
                          <?php echo e($rp->nama); ?> <small>(<?php echo e($rp->jumlah); ?>)</small>
                        </a>
                  <?php endforeach; ?>
              </div>
            </div>
            <p>Tidak Menemukan Informasi yang Anda Cari?</p>
            <p><a href="<?php echo e(URL::to("permohonan/ajukanpermohonan")); ?>" class="btn btn-cyan"><i class="fa fa-paper-plane"></i> Ajukan Permohonan Infomasi</a></p>
            <span class="hidden-lg hidden-sm hidden-md"><br><br></span>

        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>