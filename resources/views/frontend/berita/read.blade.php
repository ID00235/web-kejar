@extends('frontend.layout')
@section("pagetitle",$berita->judul)
@section("pageslider")
	@include("frontend.pageberita")
@endsection
@section("content")
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">
         <div class="col-md-1">
            <div class="share-it"></div>
            <div class="mb-20"></div>
        </div>
        <div class="col-md-7">
            <div class="blog-post gallery-post">
                  <div class="post-content">
                      <h4><a href="{{Request::url()}}"><span>{{$berita->judul}}</span></a></h4>
                      <ul class="post-meta" style="font-size: 0.86em !important;">
                        <li><i class="fa fa-calendar"></i> Diposting Pada {{tanggal_indo2($berita->tanggal)}}</li>
                        <li><i class="fa fa-eye"></i> Dibaca: {{$berita->dibaca}} Kali</li>
                      </ul>
                  </div>
                  <div class="post-head" style="margin-top: 20px;">
                      <div class = "thumbnail">
                           <img width="100%" src = "{{asset('berita/'.$berita->gambar)}}" class="img-responsive">
                           <div class = "caption">{{$berita->title_gambar}}</div>
                      </div>
                  </div>
                  <div class="post-isi">
                      <?php echo $berita->isi;?>
                      
                  </div>
            </div>       
            <p></p>
        </div>
        <div class="col-md-4">
            <div class="sidemenu">
              <h4 class="classic-title"><span>Berita Lainnya</span></h4>
              <ul class="listnews">
                 <?php
                 $id = $berita->id;
                 $upnews = DB::table('berita')->select('judul','id','tanggal')
                          ->where('id','>', $id)->orderby('id','desc')->limit(4)->get();
                 $downnews = DB::table('berita')->select('judul','id','tanggal')
                          ->where('id','<', $id)->orderby('id','desc')->limit(4)->get();
                 ?>
                @foreach($upnews as $bt)
                      <?php
                           $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                      ?>
                  <li>
                    <a href="{{$url}}">{{$bt->judul}}</a><br>
                    <small>{{tanggal_Singkat_indo($bt->tanggal)}}</small>
                  </li>
                @endforeach

                @foreach($downnews as $bt)
                      <?php
                           $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                      ?>
                  <li>
                    <a href="{{$url}}">{{$bt->judul}}</a><br>
                    <small>{{tanggal_Singkat_indo($bt->tanggal)}}</small>
                  </li>
                @endforeach
                </ul>
            </div>

            <div class="sidemenu">
                    <h4 class="classic-title"><span>Informasi</span></h4>
                    <?php
                    $informasi = DB::table('informasi')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($informasi as $p)
                      <?php
                              $url = URL::to("informasi/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="{{$url}}">{{$p->nama}}</a></li>
                    @endforeach
                    </ul>
            </div>

            <div class="sidemenu">
                    <h4 class="classic-title"><span>Profil Kecamatan</span></h4>
                    <?php
                      $profil = DB::table('profil')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($profil as $p)
                      <?php
                              $url = URL::to("profil/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="{{$url}}">{{$p->nama}}</a></li>
                    @endforeach
                    </ul>
            </div>

        </div>

 		</div>
    </div>
 	</div>
@endsection