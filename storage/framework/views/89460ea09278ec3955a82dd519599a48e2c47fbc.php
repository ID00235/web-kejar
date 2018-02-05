<?php
$setting = DB::table('setting')->first();
?>
<header class="clearfix">
      


      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="<?php echo e(URL::to("/")); ?>">
              <img alt="" class="hidden-md hidden-lg hidden-sm " 
              style="height:30px !important; top: -5px !important; position: relative;" 
              src="<?php echo e(asset('images/logo-web.png')); ?>

              ">
              <img alt="" class="hidden-xs" style="height:45px !important; top: -10px !important; position: relative;" 
              src="<?php echo e(asset('images/logo-web.png')); ?>

              ">
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li  <?php if($route=="home"): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::to("/")); ?>">Beranda</a></li>
              <li <?php if($route=="berita"): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::to("semua-berita")); ?>">Berita</a>
              </li>
              <li <?php if($route=="profil"): ?> class="active" <?php endif; ?>>
                <a href="#">Profil</a>
                <ul class="dropdown">
                  <?php
                    $profil = $menu["profil"];
                  ?>
                  <?php foreach($profil as $p): ?>
                  <li><a href="<?php echo e(URL::to("profil"."/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li <?php if($route=="kelurahan"): ?> class="active" <?php endif; ?>>
                <a href="#">Kelurahan dan Desa</a>
                <ul class="dropdown">
                  <?php
                    $kelurahan = $menu["kelurahan"];
                  ?>
                  <?php foreach($kelurahan as $p): ?>
                  <li><a href="<?php echo e(URL::to("kelurahan"."/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li <?php if($route=="dataumum"): ?> class="active" <?php endif; ?>>
                  <a href="#">Data Umum</a>
                  <?php
                    $dataumum = $menu["dataumum"];
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($dataumum as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("dataumum/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                  </ul>
              </li>
              <li <?php if($route=="informasi"): ?> class="active" <?php endif; ?>>
                  <a href="#">Informasi</a>
                  <?php
                    $informasi = $menu["informasi"];
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($informasi as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("informasi/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                  </ul>
              </li>
              <li <?php if($route=="gallery"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url::to("gallery-photo")); ?>">Gallery</a>
              </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
            <li <?php if($route=="beranda"): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::to("/")); ?>">Home</a></li>
            <li <?php if($route=="berita"): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::to("semua-berita")); ?>">Berita</a></li>
            <li <?php if($route=="profil"): ?> class="active" <?php endif; ?>>
              <a href="#">Profil Kecamatan</a>
              <ul class="dropdown">
                <?php
                  $profil = $menu["profil"];
                ?>
                <?php foreach($profil as $p): ?>
                <li><a href="<?php echo e(URL::to("profil"."/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li <?php if($route=="kelurahan"): ?> class="active" <?php endif; ?>>
                <a href="#">Kelurahan dan Desa</a>
                <ul class="dropdown">
                  <?php
                    $kelurahan = $menu["kelurahan"];
                  ?>
                  <?php foreach($kelurahan as $p): ?>
                  <li><a href="<?php echo e(URL::to("kelurahan"."/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li <?php if($route=="dataumum"): ?> class="active" <?php endif; ?>>
                  <a href="#">Data Umum</a>
                  <?php
                    $dataumum = $menu["dataumum"];
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($dataumum as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("dataumum/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                  </ul>
              </li>
              <li <?php if($route=="informasi"): ?> class="active" <?php endif; ?>>
                  <a href="#">Informasi</a>
                  <?php
                    $informasi = $menu["informasi"];
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($informasi as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("informasi/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                  </ul>
              </li>
            <li <?php if($route=="gallery"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url::to("gallery")); ?>">Gallery</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>