<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li <?php if($route=="home"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/home')); ?>"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li <?php if($route=="permohonan"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/permohonan')); ?>"><i class="fa fa-address-card-o"></i> Permohonan Informasi
                <?php
                    $baru = DB::table('permohonan')->where('status',1)->count();
                ?>
                <?php if($baru>0): ?>
                    <span class="badge badge-danger pull-right"><?php echo e($baru); ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li <?php if($route=="keberatan"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/keberatan')); ?>"><i class="fa fa-hand-stop-o"></i> Keberatan</a>
        </li>
        <li <?php if($route=="berita"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/berita')); ?>"><i class="fa fa-newspaper-o"></i> Posting Berita</a>
        </li>
        <li <?php if($route=="pengumuman"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/pengumuman')); ?>"><i class="fa fa-bullhorn"></i> Pengumuman</a>
        </li>
        <li <?php if($route=="dip"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/dip')); ?>"><i class="fa fa-file-text-o"></i> Daftar Informasi Publik</a>
        </li>
        <li <?php if($route=="gallery"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/gallery')); ?>"><i class="fa fa-photo"></i> Gallery</a>
        </li>
        <li <?php if($route=="ppidpembantu"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/ppidpembantu')); ?>"><i class="fa fa-bank"></i> PPID Pembantu</a>
        </li>
        <?php if(Auth::user()->usertype=='admin'): ?>
            <li <?php if($route=="prosedur"): ?>class="current" <?php endif; ?>>
                <a href="<?php echo e(URL::to('/admin/prosedur')); ?>"><i class="fa fa-ticket"></i> Prosedur/Mekanisme Layanan</a>
            </li>
            <li <?php if($route=="profil"): ?>class="current" <?php endif; ?>>
                <a href="<?php echo e(URL::to('/admin/profil')); ?>"><i class="fa fa-building-o"></i> Profile PPID</a>
            </li>
            <li <?php if($route=="pengguna"): ?>class="current" <?php endif; ?>>
                <a href="<?php echo e(URL::to('/admin/pengguna')); ?>"><i class="fa fa-users"></i> User Admin/Operator</a>
            </li>
            <li <?php if($route=="header"): ?>class="current" <?php endif; ?>>
                <a href="<?php echo e(URL::to('/admin/header')); ?>"><i class="fa fa-ellipsis-h"></i> Header Depan</a>
            </li>
            <li <?php if($route=="referensi"): ?>class="open" <?php endif; ?> class="submenu">
                <a href="#"><i class="fa fa-server"></i> Data Referensi <span class="caret pull-right"></span></a>
                <!-- Sub menu -->
                <ul>
                    <li  <?php if(isset($subroute) && $subroute=="jenisinformasi"): ?> class="current" <?php endif; ?> >
                        <a href="<?php echo e(URL::to('/admin/referensi/jenisinformasi')); ?>">Jenis Informasi</a>
                    </li>
                    <li <?php if(isset($subroute) && $subroute=="kategoriinformasi"): ?> class="current" <?php endif; ?>>
                        <a href="<?php echo e(URL::to('/admin/referensi/kategoriinformasi')); ?>">Kategori Informasi Publik</a>
                    </li>
                    <li <?php if(isset($subroute) && $subroute=="alasankeberatan"): ?> class="current" <?php endif; ?>>
                        <a href="<?php echo e(URL::to('/admin/referensi/alasankeberatan')); ?>">Alasan Pengajuan Keberatan</a>
                    </li>
                </ul>
            </li>        
            <li <?php if($route=="setting"): ?>class="current" <?php endif; ?>>
                <a href="<?php echo e(URL::to('/admin/setting')); ?>">
                <i class="fa fa-info-circle" aria-hidden="true"></i>Informasi Kontak</a>
            </li>
        <?php endif; ?>
        <li <?php if($route=="support"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/support')); ?>"><i class="fa fa-at"></i> Special Content</a>
        </li>
        <li>
            <a href="<?php echo e(URL::to('')); ?>" target="_blank">
            <i class="fa fa-external-link" aria-hidden="true"></i>Frontpage PPID</a>
        </li>
        <li>
            <a href="http:///webmail.batangharikab.go.id" target="_blank">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>Webmail Batanghari</a>
        </li>
    </ul>
</div>