@extends('frontend.layout')
@section("pagetitle","Kelurahan dan Desa")
@section("subpage","Profil Kelurahan / Desa Kecamatan Batin XXIV")
@section("pageslider")
	@include("frontend.pagetop")
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
                  <h3 class=""> <center><a href="{{Request::url()}}"><span>{{$halaman->nama}}</span></a></center></h3>
                  <center><?=$halaman->alamat_kantor;?></center>
                  <p>
                      <center>
                        <div class="thumbnail" style="width: 180px;">
                          <img   src="{{asset($halaman->photo_lurah)}}">
                            <div class="caption">
                                <center><b><?=$halaman->nama_lurah;?></b></center>
                                <center>
                                    @if($halaman->tipe=='kelurahan')
                                    (Kepala Kelurahan)
                                    @else
                                    (Kepala Desa)
                                    @endif
                                </center>
                            </div>
                        </div>
                      </center>  
                  </p>
                  <p>                          
                   <center>
                    @if($halaman->tipe=='kelurahan')
                    Pejabat Kelurahan
                    @else
                    Pejabat Desa
                    @endif
                    </center>
                  </p>
                  <p>
                      {!! $halaman->pejabat_kelurahan !!}
                  </p>
                  <p>
                      <div class="thumbnail">
                          <img  width="100%"  src="{{asset($halaman->photo_kantor)}}">
                          <div class="caption">
                              <center><b>Kantor {{$halaman->nama}}</b></center>
                          </div>
                      </div>
                  </p>
            </div>   
        </div>       
        <div class="col-md-4">
            <div class="sidemenu">
                    <h4 class="classic-title"><span>Kelurahan / Desa Lainnya</span></h4>
                    <?php
                      $kelurahan = DB::table('kelurahan')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($kelurahan as $p)
                      <?php
                              $url = URL::to("kelurahan/".$p->id."/".generate_url($p->nama));
                          ?>
                      <li><a href="{{$url}}">{{$p->nama}}</a></li>
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

        </div>

 		</div>
    </div>
 	</div>
@endsection