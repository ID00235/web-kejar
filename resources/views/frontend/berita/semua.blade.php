@extends('frontend.layout')
@section("pagetitle","Semua Berita")
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
            <h4 class=" classic-title"><span>Berita Terkini</span></h4>
            <div class="row">
                @foreach($berita as $bt)
                <?php
                    $url = URL::to("baca/".$bt->id."/".generate_url($bt->judul)."/".$bt->tanggal);
                ?>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 15px;">
                    <div class="col-lg-2 col-xs-3" style="padding:5px;">
                      <img src="{{asset('berita/thumb.'.$bt->gambar)}}" width="100%">
                    </div>
                    <div class="col-lg-10 col-xs-9">
                      <b class="media-heading"><a href="{{$url}}">{{cuttext80($bt->judul)}}</a></b><br>
                      <small style="text-align: justify;" class="hidden-xs">{{gettextdeskripsi2($bt->isi)}} 
                      <br></small>
                      <small><i class="fa fa-calendar"></i> {{tanggal_singkat_indo($bt->tanggal)}}</small>
                    </div>  
                </div>
                @endforeach
                <center> {{ $berita->links() }} </center>
                <p class="hidden-md hidden-lg">&nbsp;</p>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12" style=" padding-left: 20px !important; padding-right: 20 !important;">
          @include('frontend.sidebar')
        </div>

 		</div>
    </div>
 	</div>
@endsection