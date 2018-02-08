@extends('frontend.layout')
@section("pagetitle","Beranda")

@section("pageslider")
	@include("frontend.pageslider")
@endsection


@section("content")
	
             
      
      <!-- Start News & Skill Section -->
      <div class="container">
          <div class="row">
              <div class="col-sm-8 col-xs-12" style="padding-right: 15px !important;">
                <h4 class="classic-title"><span>Berita Terkini</span>
                <small class="pull-right"><a href="{{url('semua-berita')}}">Semua Berita</a></small>
                </h4>
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
                              <small style="text-align: justify;" class="hidden-xs">{{gettextdeskripsi($bt->isi)}} 
                              <br></small>
                              <small><i class="fa fa-calendar"></i> {{tanggal_singkat_indo($bt->tanggal)}}</small>
                            </div>
                        </div>
                      @endforeach
                </div>
                 <p class="hidden-xs">&nbsp;</p>
                <p class="hidden-md hidden-lg">&nbsp;</p>
                <p class="hidden-xs">&nbsp;</p>
                <h4 class="classic-title"><span>Gallery Photo Kegiatan</span>
                <small class="pull-right"><a href="{{url('gallery-photo')}}">Semua Photo</a></small>
                </h4>
                <?php
                    $photo = DB::table('gallery_photo')->orderby('created_at','desc')->limit(6)->skip(0)->get();
                    ?>
                    @foreach($photo as $pt)
                     <div class="col-md-6">
                        <a href="{{URL::to('gallery/photo').'/'.$pt->filename}}" title="{{$pt->deskripsi}}" class="view-photo">
                            <span class="thumb-info thumb-info-lighten"> 
                                <span class="thumb-info-wrapper"> 
                                <div style="position:relative;height:0;padding-bottom:56.25%"> 
                                <img src="{{URL::to('gallery/photo').'/thumb-'.$pt->filename}}" class="img-responsive" style="left:0;right:0;top:0;bottom:0"> 
                                    <span class="thumb-info-action"> 
                                        <span class="thumb-info-action-icon"><i class="fa fa-search-plus"></i></span> 
                                    </span> 
                                </div> 
                                </span> 
                            </span> 
                            <div style="height:50px"> 
                                <p style="text-align:center"><small>{{cuttext50($pt->deskripsi)}}</small></p> 
                            </div> 
                        </a>    
                    </div>
                    @endforeach
                  <hr class="hidden-lg">
              </div>
              <div class="col-sm-4 col-xs-12" style="background:#f2f3f4; padding-left: 20px !important; padding-right: 20 !important;">
                @include('frontend.sidebar')
              </div>
          </div>
        <div class="hr1 margin-60"></div>
      </div>

    @section("javascript")
    @@parent
    <script>
        $(function(){
            $('.view-photo').magnificPopup({
                type: 'image',
                image : {titleSrc: 'title'}
            });
            $('.view-video').magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/',
                            id: 'v=', 
                            src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                        }
                    }
                }
            });
        })
    </script>
    @endsection
@endsection