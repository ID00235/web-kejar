
<?php $__env->startSection("pagetitle",$dokumen->nama); ?>
<?php $__env->startSection("subtitle","Dokumen Informasi Publik"); ?>
<?php $__env->startSection("pageslider"); ?>
	<?php echo $__env->make("frontend.pagedokumen", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-8">
            <div class="blog-post">
                  <div class="post-content">
                      <div class="post-type"><i class="icon icon-dokumen"></i></div>
                      <h2><a href="<?php echo e(Request::url()); ?>"><span><?php echo e($dokumen->nama); ?></span></a></h2>
                      <ul class="post-meta">
                        <li><i class="fa fa-eye"></i> Dilihat: <?php echo e($dokumen->dibaca); ?> Kali</li>
                      </ul>
                  </div>
                  <div class="post-head" style="margin-top: 20px;">
                       <table class="table table-striped table-responsive">
                          <tr>
                            <td colspan="2"><b>Informasi Dokumen</b></td>
                          </tr>
                          <tr>
                              <td width="30%" class="hidden-xs">Nomor</td>
                              <td>
                                  <small  class="hidden-md hidden-sm hidden-lg">Nomor<br></small>
                                   <?php echo e($dokumen->nomor); ?>

                              </td>
                          </tr>
                          <tr>
                              <td width="30%" class="hidden-xs">Penerbit</td>
                              <td>
                                  <small  class="hidden-md hidden-sm hidden-lg">Penerbit<br></small>
                                   <?php echo e($dokumen->penerbit); ?>

                              </td>
                          </tr>
                          <tr>
                              <td width="30%" class="hidden-xs">Tanggal Publikasi</td>
                              <td>
                                  <small  class="hidden-md hidden-sm hidden-lg">Tanggal Publikasi<br></small>
                                   <?php echo e(tanggal_indo2($dokumen->tanggal)); ?>

                              </td>
                          </tr>
                          <tr>
                              <td  class="hidden-xs">Kategori Informasi</td>
                              <td>
                              <small  class="hidden-md hidden-sm hidden-lg">Kategori Informasi<br></small>
                              <?php echo e($dokumen->getkategori->nama); ?>

                              </td>
                          </tr>
                          <tr>
                              <td  class="hidden-xs">Jenis Informasi</td>
                              <td>
                              <small  class="hidden-md hidden-sm hidden-lg">Jenis Informasi<br></small>
                              <?php echo e($dokumen->getjenis->nama); ?></td>
                          </tr>
                          <tr>
                              <td  class="hidden-xs">Kandungan Informasi</td>
                              <td><small  class="hidden-md hidden-sm hidden-lg">Kandungan Informasi</small>
                              <?=$dokumen->kandungan_informasi;?></td>
                          </tr>
                       </table>
                       <?php
                       $direktori = $dokumen->nomor;
                       $filedokumen = DB::table('file_dokumen')->where('id_dokumen', $dokumen->id)->get();
                       $no = 0;
                       ?>
                       <table class="table table-striped table-responsive">
                        <?php foreach($filedokumen as $fd): ?>
                        <?php
                        $no++;
                        $filename = $fd->filename;
                        $url_download = URL::to("/download/dokumen/$direktori/$filename");
                        $url_lock = URL::to("/download/dokumen/".Crypt::encrypt($fd->id));
                        if ($fd->kunci){
                          $url_download = $url_lock;
                        }
                        ?>
                          <tr>
                              <td class="hidden-xs"><?php echo e($filename); ?></td>
                              <td>
                                    <small  class="hidden-md hidden-sm hidden-lg"><?php echo e($filename); ?></small>
                                   <a href="<?php echo e($url_download); ?>" class="btn btn-cyan btn-xs pull-right">
                                      <?php if($fd->kunci): ?><i class="fa fa-lock"></i>&nbsp;<?php else: ?> <i class="fa fa-download"></i><?php endif; ?> Download
                                   </a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                       Berbagi ke Jejaring Sosial: <div class="share-it"></div>
                  </div>
            </div>       
        </div>

        <div class="col-md-4">

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

            <div class="latest-posts-classic" style="background: url(images/prosedur.png)  no-repeat right top;">
            <h4 class="classic-title"><span>Populer</span></h4>
            <?php
                $dokumen_populer = DB::table('dokumen')->orderby('dibaca','desc')
                                  ->offset(0)->limit(5)->get();
            ?>
            <?php foreach($dokumen_populer as $bt): ?>
            <?php
                $url = URL::to("daftarinformasi/detail/".$bt->nomor);
            ?>
            <div class="post-row">
                <div class="left-meta-post">
                  <div class="post-type hidden-xs"><i class="fa fa-file-text-o"></i></div>
                  <i class="fa fa-file-text-o hidden-md hidden-sm hidden-lg i-icon"></i>
                </div>
                <h5 class="post-title"><a href="<?php echo e($url); ?>"><?php echo e(cuttext($bt->nama)); ?></a></h5>
                <div class="post-content">
                  <p class="hidden-xs"><?php echo e($bt->penerbit); ?> | <?php echo e(tanggal_singkat_indo($bt->tanggal)); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
            <div style="margin-top: 20px;"></div>
            <p class="pull-right">
              <a href="<?php echo e(URL::to('daftarinformasi')); ?>"> Lihat Daftar Informasi Publik <i class="fa fa-angle-right"></i></a>
            </p>
        </div>

 		</div>
    </div>
 	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>