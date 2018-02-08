@extends('frontend.layout')
@section("pagetitle","Informasi")
@section("subpage","Kejaksaan Negri Batanghari")
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
                  <div class="post-title">
                      <h3 class=""><a href="{{Request::url()}}"><span>{{$halaman->nama}}</span></a></h3>
                  </div>
                  <div class="post-isi">
                      <?php echo $halaman->isi;?>
                  </div>
            </div>   
        </div>       
        <div class="col-md-4">           
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
                    <h4 class="classic-title"><span>Data Umum</span></h4>
                    <?php
                    $dataumum = DB::table('dataangka')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($dataumum as $p)
                      <?php
                              $url = URL::to("dataumum/".$p->id."/".generate_url($p->nama));
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