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
        <div class="col-sm-4 col-xs-12" style="background:#f2f3f4; padding-left: 20px !important; padding-right: 20 !important;">
          @include('frontend.sidebar')
        </div>

 		</div>
    </div>
 	</div>
@endsection