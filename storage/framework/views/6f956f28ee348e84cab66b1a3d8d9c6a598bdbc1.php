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
            <a href="<?php echo e(URL::to('/admin/profil')); ?>"><i class="fa fa-building-o"></i> Profil Kejaksaan</a>
        </li>
        <li <?php if($route=="organisasi"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/organisasi')); ?>"><i class="fa fa-building-o"></i> Organisasi Kejaksaan</a>
        </li>
        <li <?php if($route=="pejabat-struktural"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/pejabat-struktural')); ?>"><i class="fa fa-users"></i> Pejabat Struktural</a>
        </li> 
        <li <?php if($route=="sarana"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/sarana')); ?>"><i class="fa fa-building-o"></i> Sarana Kejaksaan</a>
        </li>
        <li <?php if($route=="gallery"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/gallery')); ?>"><i class="fa fa-image"></i> Gallery Photo</a>
        </li>
        <li <?php if($route=="header"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/header')); ?>"><i class="fa fa-ellipsis-h"></i> Header Website</a>
        </li> 
        <li <?php if($route=="peraturan"): ?> class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/peraturan')); ?>"><i class="fa fa-book"></i> Peraturan</a>
        </li>       
        <li <?php if($route=="setting"): ?>class="current" <?php endif; ?>>
            <a href="<?php echo e(URL::to('/admin/setting')); ?>">
            <i class="fa fa-info-circle" aria-hidden="true"></i>Informasi Kontak</a>
        </li>
        <li>
            <a href="<?php echo e(URL::to('')); ?>" target="_blank">
            <i class="fa fa-external-link" aria-hidden="true"></i>Visit Website</a>
        </li>
        
    </ul>
</div>