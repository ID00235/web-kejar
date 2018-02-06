@extends('frontend.layout')
@section("pagetitle","Organisasi Kejaksaan Negeri")
@section("subpage","Batanghari")
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
                      <h3 class=""><a href="{{Request::url()}}"><span>{{$organisasi->nama}}</span></a></h3>
                  </div>
                  <div class="post-isi">
                      <?php echo $organisasi->isi;?>
                  </div>
            </div>   
        </div>       
        <div class="col-md-4">
            <div class="sidemenu">
                    <h4 class="classic-title"><span>Organisasi Pengadilan Negeri Batanghari</span></h4>
                    <?php
                      $organisasi = DB::table('organisasi')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($organisasi as $p)
                      <?php
                              $url = URL::to("organisasi/".$p->id."/".generate_url($p->nama));
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