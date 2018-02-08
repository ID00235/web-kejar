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
        <div class="col-sm-4 col-xs-12" style="background:#f2f3f4; padding-left: 20px !important; padding-right: 20 !important;">
          @include('frontend.sidebar')
        </div>

 		</div>
    </div>
 	</div>
@endsection