<?php
$setting = DB::table('setting')->first();
?>
<header class="clearfix">
      <!-- Start Top Bar -->
      <div class="top-bar hidden-xs">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                <li><a href="#"><i class="fa fa-envelope-o"></i> <?php echo e($setting->email); ?></a>
                </li>
                <li><a href="#"><i class="fa fa-phone"></i> <?php echo e($setting->telepon); ?></a>
                </li>
                <li><a href="<?php echo e($setting->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i> @batangharikab</a>
                </li>
              </ul>
              <!-- End Contact Info -->
            </div>
            <!-- .col-md-6 -->
            
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .top-bar -->
      <!-- End Top Bar -->


      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default navbar-top">
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
              src="<?php echo e(asset('images/logo-ppid.png')); ?>

              ">
              <img alt="" class="hidden-xs" style="height:45px !important; top: -10px !important; position: relative;" 
              src="<?php echo e(asset('images/logo-ppid.png')); ?>

              ">
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li <?php if($route=="berita"): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::to("semua-berita")); ?>">Berita</a>
              </li>
              <li <?php if($route=="profil"): ?> class="active" <?php endif; ?>>
                <a href="#">Profil PPID</a>
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
              <li <?php if($route=="daftarinformasi"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(URL::to("/daftarinformasi")); ?>">Informasi Publik</a>
              </li>
              <li <?php if($route=="prosedur" || $route=="permohonan"): ?> class="active" <?php endif; ?>>
                  <a href="#">Layanan Informasi</a>
                  <?php
                    $prosedur = DB::table('prosedur')->orderby('id')->get();
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($prosedur as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("prosedur/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                    <li>
                        <a href="<?php echo e(URL::to("permohonan/ajukanpermohonan")); ?>">Permohonan Informasi</a>
                    </li>
                    <li>
                        <a href="<?php echo e(URL::to("permohonan/statuspermohonan")); ?>">Status Permohonan Informasi</a>
                    </li>
                  </ul>
              </li>
              <li <?php if($route=="ppidpembantu"): ?> class="active" <?php endif; ?>>
                  <a href="<?php echo e(url::to("ppidpembantu")); ?>">PPID Pembantu</a>
              </li>
              <li <?php if($route=="download"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url::to("unduhan")); ?>">Unduhan</a>
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
              <a href="#">Profil PPID</a>
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
            <li <?php if($route=="daftarinformasi"): ?> class="active" <?php endif; ?>>
              <a href="<?php echo e(URL::to("/daftarinformasi")); ?>">Daftar Informasi</a>
            </li>
            <li <?php if($route=="prosedur" || $route=="permohonan"): ?> class="active" <?php endif; ?>>
                  <a href="#">Layanan Informasi</a>
                  <?php
                    $prosedur = DB::table('prosedur')->orderby('id')->get();
                  ?>
                  <ul class="dropdown">        
                    <?php foreach($prosedur as $p): ?>
                      <li>
                        <a href="<?php echo e(URL::to("prosedur/".$p->id."/".generate_url($p->nama))); ?>"><?php echo e($p->nama); ?></a>
                     </li>
                    <?php endforeach; ?>        
                    <li>
                        <a href="<?php echo e(URL::to("permohonan/ajukanpermohonan")); ?>">Permohonan Informasi</a>
                    </li>
                    <li>
                        <a href="<?php echo e(URL::to("permohonan/statuspermohonan")); ?>">Status Permohonan Informasi</a>
                    </li>
                  </ul>
              </li>
            <li <?php if($route=="ppidpembantu"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url::to("ppidpembantu")); ?>">PPID Pembantu</a>
            </li>
            <li <?php if($route=="download"): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url::to("unduhan")); ?>">Unduhan</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>