 <?php $__env->startSection('content'); ?>
<?php
    $n_permohonan = DB::table('permohonan')->count();
    $n_keberatan = DB::table('keberatan')->count();
    $n_berita = DB::table('berita')->count();
    $n_pengumuman = DB::table('pengumuman')->count();
    $n_dip = DB::table('dokumen')->count();
    $n_ppid = DB::table('ppid_pembantu')->count();
    $n_gallery = DB::table('gallery_photo')->count() + DB::table('gallery_video')->count();
    $n_unduhan = DB::table('spesial_konten')->count(); 
?>
<div class="row">
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-address-card-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Permohonan Informasi</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/permohonan/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_permohonan); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-hand-stop-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Keberatan Atas Informasi</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/keberatan/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_keberatan); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-newspaper-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Berita Kabupaten Batang Hari</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/berita/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_berita); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-bullhorn green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Pengumuman dan Informasi Lainnya</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/pengumuman/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_pengumuman); ?></span>
        </div>
    </div>
    
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-file-text-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Dokumen Informasi Publik</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/dip/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_dip); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-image green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Gallery Photo dan Video</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/gallery/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_gallery); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-institution green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> PPID Pembantu di Kabupaten Batang Hari</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/ppidpembantu/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_ppid); ?></span>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-download green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <span> Konten Unduhan</span>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="<?php echo e(URL::to('admin/support/')); ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right"><?php echo e($n_unduhan); ?></span>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>