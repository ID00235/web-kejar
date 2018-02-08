@extends('frontend.layout')
@section("pagetitle","Gallery Photo")
@section("subpage","Kejaksaan Negeri Batanghari")
@section("pageslider")
	@include("frontend.pagetop")
@endsection
@section("content")
<?php
$setting = DB::table('setting')->first();
?>
    <!-- Start News & Skill Section -->
    <div class="container">
      <div class="page-content">
        <div class="row">

        <div class="col-md-12">
        	<h4 class="classic-title"><span>Gallery Photo</span></h4>
            @foreach($photo as $pt)
             <div class="col-md-3">
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
                        <p style="text-align:center">{{cuttext50($pt->deskripsi)}}</p> 
                    </div> 
                </a>    
            </div>
            @endforeach
            <div class="col-md-12">
            {{$photo->links()}}
            </div>
            <p>&nbsp;</p>
        </div>
 		</div>
    </div>
 	</div>
@endsection

@section("javascript")
      @@parent
      <script type="text/javascript">
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