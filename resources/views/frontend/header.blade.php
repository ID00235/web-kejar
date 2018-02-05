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
            <a class="navbar-brand" href="{{URL::to("/")}}">
              <img alt="" class="hidden-md hidden-lg hidden-sm " 
              style="height:30px !important; top: -5px !important; position: relative;" 
              src="{{asset('images/logo-web.png')}}
              ">
              <img alt="" class="hidden-xs" style="height:45px !important; top: -10px !important; position: relative;" 
              src="{{asset('images/logo-web.png')}}
              ">
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li  @if($route=="home") class="active" @endif><a href="{{URL::to("/")}}">Beranda</a></li>
              <li @if($route=="berita") class="active" @endif><a href="{{URL::to("semua-berita")}}">Berita</a>
              </li>
              
              <li @if($route=="profil") class="active" @endif>
                <a href="#">Profil</a>
                <ul class="dropdown">
                  <?php
                    $profil = $menu["profil"];
                  ?>
                  @foreach($profil as $p)
                  <li><a href="{{URL::to("profil"."/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              
              <li @if($route=="gallery") class="active" @endif>
                <a href="{{url::to("gallery-photo")}}">Gallery</a>
              </li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
            <li @if($route=="beranda") class="active" @endif><a href="{{URL::to("/")}}">Home</a></li>
            <li @if($route=="berita") class="active" @endif><a href="{{URL::to("semua-berita")}}">Berita</a></li>
            <li @if($route=="profil") class="active" @endif>
              <a href="#">Profil Kecamatan</a>
              <ul class="dropdown">
                <?php
                  $profil = $menu["profil"];
                ?>
                @foreach($profil as $p)
                <li><a href="{{URL::to("profil"."/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a>
                </li>
                @endforeach
              </ul>
            </li>
            <li @if($route=="kelurahan") class="active" @endif>
                <a href="#">Kelurahan dan Desa</a>
                <ul class="dropdown">
                  <?php
                    $kelurahan = $menu["kelurahan"];
                  ?>
                  @foreach($kelurahan as $p)
                  <li><a href="{{URL::to("kelurahan"."/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li @if($route=="dataumum") class="active" @endif>
                  <a href="#">Data Umum</a>
                  <?php
                    $dataumum = $menu["dataumum"];
                  ?>
                  <ul class="dropdown">        
                    @foreach($dataumum as $p)
                      <li>
                        <a href="{{URL::to("dataumum/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a>
                     </li>
                    @endforeach        
                  </ul>
              </li>
              <li @if($route=="informasi") class="active" @endif>
                  <a href="#">Informasi</a>
                  <?php
                    $informasi = $menu["informasi"];
                  ?>
                  <ul class="dropdown">        
                    @foreach($informasi as $p)
                      <li>
                        <a href="{{URL::to("informasi/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a>
                     </li>
                    @endforeach        
                  </ul>
              </li>
            <li @if($route=="gallery") class="active" @endif>
                <a href="{{url::to("gallery")}}">Gallery</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>