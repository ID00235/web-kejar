
<?php $__env->startSection("pagetitle","Daftar Informasi"); ?>
<?php $__env->startSection("subtitle","Daftar Informasi Publik"); ?>
<?php $__env->startSection("subpage","Daftar Informasi Publik PPID Kabupaten Batang Hari"); ?>
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
                  <?php if($pencarian): ?>
                    <tr>
                      <td colspan="2">
                          <b>Hasil Pencarian Dokumen</b> <br>
                          Kata Kunci : <i><?php echo e($keyword["judul"]); ?></i> | Jenis: <i><?php echo e($keyword["jenis"]); ?></i> | 
                          Kategori: <i><?php echo e($keyword["kategori"]); ?></i> <br>
                          <?php if($count): ?>
                          <?php echo e($count); ?> Dokumen Ditemukan
                          <?php endif; ?>
                      </td>
                    </tr>
                  <?php endif; ?>
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
            <div class="panel panel-default">
              <div class="panel-heading">
                <h5 style="padding: 10px;">Pencarian</h5>
              </div>
              <div class="panel-body">
              <?php
                $judul = Request::input("keyword");
                $kategori = Request::input("kategori");
                $jenis = Request::input("jenis");
              ?>
              <form role="form"  class="contact-form" method="get" action="">
                  <div class="form-group">
                      <label>Judul</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="keyword"  value="<?php echo e($judul); ?>" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Jenis Informasi</label>
                      <div class="controls">
                          <select class="form-control" name="jenis">
                              <option value="">Semua</option>
                              <?php
                              $jenis_informasi = DB::table('jenis_informasi')->get();
                              ?>
                              <?php foreach($jenis_informasi as $kt): ?>
                              <option value="<?php echo e($kt->id); ?>"  <?php if($jenis==$kt->id): ?>) selected="selected" <?php endif; ?>><?php echo e($kt->nama); ?></option>
                              <?php endforeach; ?>
                          </select>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Kategori</label>
                      <div class="controls">
                          <select class="form-control" name="kategori">
                              <option value="">Semua</option>
                              <?php
                              $kategori_informasi = DB::table('kategori_informasi')->get();
                              ?>
                              <?php foreach($kategori_informasi as $kt): ?>
                              <option value="<?php echo e($kt->id); ?>"  <?php if($kategori==$kt->id): ?>) selected="selected" <?php endif; ?>><?php echo e($kt->nama); ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <button class="btn btn-cyan" type="submit"><i class="fa fa-search"></i> Cari Dokumen</button>
                  <a href="<?php echo e(URL::to('daftarinformasi')); ?>" class="btn btn-defaul" type="submit"><i class="fa fa-refresh"></i> Reset</a>
              </form>
              </div>
            </div>
            <h4 class="classic-title"><span>Kategori Informasi</span></h4>
            <div class="latest-posts-classic" style="background: url(images/folder.png)  no-repeat right bottom;">
              <?php
              $rekap_kategori = DB::select("SELECT kategori_informasi.id as id, kategori_informasi.nama as nama, count(dokumen.id) as jumlah FROM `kategori_informasi` left join dokumen on kategori_informasi.id = dokumen.kategori group by kategori_informasi.id");
              ?>
                  <?php foreach($rekap_kategori as $rk): ?>
                   <div class="post-row">
                      <div class="left-meta-post">
                        <div class="post-type hidden-xs"><i class="icon icon-kategori-dokumen"></i></div>
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