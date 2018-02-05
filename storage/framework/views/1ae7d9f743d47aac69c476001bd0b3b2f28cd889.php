<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li <?php if($route=="home"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/home')); ?>"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li <?php if($route=="berita"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/berita')); ?>"><i class="fa fa-newspaper-o"></i> Berita</a>
        </li>
        <li <?php if($route=="profil"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/profil')); ?>"><i class="fa fa-building-o"></i> Profil Kecamatan</a>
        </li>
        <li <?php if($route=="kelurahan"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/kelurahan')); ?>"><i class="fa fa-ticket"></i> Kelurahan/Desa</a>
        </li>
        <li <?php if($route=="dataangka"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/dataangka')); ?>"><i class="fa fa-at"></i> Data Umum</a>
        </li>
        <li <?php if($route=="informasi"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/informasi')); ?>"><i class="fa fa-file-o"></i> Halaman Info</a>
        </li>
        <li <?php if($route=="gallery"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/gallery')); ?>"><i class="fa fa-image"></i> Gallery Photo</a>
        </li>
        <li <?php if($route=="header"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/header')); ?>"><i class="fa fa-ellipsis-h"></i> Header Website</a>
        </li>       
        <li <?php if($route=="setting"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/setting')); ?>">
            <i class="fa fa-info-circle" aria-hidden="true"></i>Informasi Kontak</a>
        </li>
        <li <?php if($route=="agenda"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/agenda')); ?>"><i class="fa fa-calendar"></i> Agenda</a>
        </li>
        <li>
            <a href="<?php echo e(URL::to('')); ?>" target="_blank">
            <i class="fa fa-external-link" aria-hidden="true"></i>Visit Website</a>
        </li>
        
    </ul>
</div>