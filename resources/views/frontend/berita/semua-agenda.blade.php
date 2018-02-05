@extends('frontend.layout')
@section("pagetitle","Agenda Kegiatan")
@section("subpage","Kecamatan Batin XXIV")
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
             <div class="latest-posts-classic">
                <h4 class="classic-title"><span>Agenda Kegiatan</span></h4>
                <?php
                  $agenda = DB::table('agenda')->orderby('tanggal_mulai','desc')->limit(5)->get();
                ?>
                @foreach($agenda as $pt)
                <?php
                  $exp = explode(" ", tanggal_singkat_indo($pt->tanggal_mulai));
                ?>
                <div class="post-row item">
                  <div class="left-meta-post">
                    <div class="post-date">
                        <span class="day">{{$exp[0]}}</span><span class="month">{{$exp[1]}}</span>
                    </div>
                  </div>
                  <b>{{$pt->nama}}</b><br>
                  <small>
                      {{$pt->lokasi}}, 
                      @if($pt->tanggal_selesai!='0000-00-00') 
                          {{tanggal_singkat_indo($pt->tanggal_mulai)}} - {{tanggal_singkat_indo($pt->tanggal_selesai)}}
                      @else 
                          {{tanggal_singkat_indo($pt->tanggal_mulai)}}
                      @endif
                  </small>
                </div>
                 @endforeach
              </div>
        </div>
        <div class="col-md-4">
            <div class="sidemenu">
                    <h4 class="classic-title"><span>Data Umum</span></h4>
                    <?php
                    $dataumum = DB::table('dataangka')->select('id','nama')->get();
                    ?>
                    <ul class="listmenu">
                    @foreach($dataumum as $p)
                      <?php
                              $url = URL::to("informasi/".$p->id."/".generate_url($p->nama));
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