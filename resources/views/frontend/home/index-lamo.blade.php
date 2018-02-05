@extends('frontend.layout')
@section("pagetitle","Beranda")

@section("pageslider")
	@include("frontend.pageslider")
@endsection


@section("content")
	
      @include("frontend.home.sliderberita")
      <!-- Divider -->

        
      
      <!-- Start News & Skill Section -->
      <div class="container">
          <div class="row">
            @include("frontend.home.slidertautan")
          </div>
      <div class="hr1 margin-60"></div>
        <div class="row">
           <div class="col-md-3">
              <!-- Classic Heading -->
              <h4 class="classic-title"><a href="{{URL::to("daftarinformasi")}}"><b>Daftar Informasi Publik </b><i class="fa fa-angle-right"></i></a></h4>
              <!-- Accordion -->
              <div >
              <table class="table noborder table-condensed">
                @foreach($dokumen_terbaru as $dip)
                    <tr>
                      <td style="width:10px">
                        <i class="icon icon-dokumen"></i>
                      </td>
                      <td align="left">
                        <b><a href="{{URL::to("daftarinformasi/detail/".$dip->nomor)}}">{{cuttext($dip->nama)}}</a></b> <br>
                      <small>{{$dip->penerbit}} | {{tanggal_singkat_indo($dip->tanggal)}}</small>
                      </td>
                    </tr>
                  @endforeach
                  <tr>
                      <td style="width:10px">
                       
                      </td>
                      <td>
                        <a href="{{URL::to("daftarinformasi")}}">Lihat Semua Daftar Informasi Publik <i class="fa fa-angle-right"></i></a> 
                      </td>
                    </tr>
                </table>
                </div>
                <p>&nbsp;</p>
               <h4 class="classic-title"><a href="{{URL::to("semua-pengumuman")}}"><b>Pengumuman</b> <i class="fa fa-angle-right"></i></a></h4>
              <!-- Accordion -->
              <div >
                  <?php 
                  $pengumuman = DB::table('pengumuman')->orderby('created_at','desc')->limit(5)->skip(0)->get();
                  ?>
              <table class="table noborder table-condensed">
                  @foreach($pengumuman as $pn)
                    <tr>
                      <td style="width:10px">
                        <i class="icon icon-pengumuman"></i>
                      </td>
                      <td align="left">
                        <b><a href="{{URL::to('baca-pengumuman/'.$pn->id).'/'.generate_url($pn->judul)}}">{{cuttext($pn->judul)}}</a></b> <br>
                      <small>{{timestamp_indo($dip->created_at)}}</small>
                      </td>
                    </tr>
                  @endforeach
                  <tr>
                      <td style="width:10px">
                       
                      </td>
                      <td>
                        <a href="{{URL::to("semua-pengumuman")}}">Lihat Semua Pengumuman <i class="fa fa-angle-right"></i></a> 
                      </td>
                    </tr>
                </table>
                </div>
                <p>&nbsp;</p> 
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->
               <h4 class="classic-title"><span>Government Public Relation</span></h4>
              <!-- Accordion -->
              <div >
              <table class="table noborder table-condensed" id="gpr-konten">
              </table>
                </div>
                <p>&nbsp;</p> 
               <script type="application/javascript">
                   $(function(){
                       $.ajax({
                            type: "GET",
                            url: "https://widget.kominfo.go.id/data/latest/gpr.xml",
                            dataType: "xml",
                            success: function(xml){
                            $(xml).find('item').each(function(){
                              var sTitle = $(this).find('title').text();
                              var sLink = $(this).find('link').text();
                              var sPub = $(this).find('pubDate').text();
                              var sAuthor = $(this).find('author').text();
                              var list = '<td style="width:30px"><i class="icon icon-gpr"></i></td><td align="left">' + '<b><a href="'+ sLink +'">'+ sTitle +'</a></b><br><small>'
                              + sAuthor+'</small> <small>'+ sPub +'</small></td>';
                              $("<tr></tr>").html(list).appendTo("#gpr-konten");
                            });
                            }
                       })
                   })
               </script>  
               
               <h4 class="classic-title"><a href="{{URL::to('semua-photo')}}"><b>Gallery Photo</b> <i class="fa fa-angle-right"></i></a></h4>
               
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
                    
            </div>

          <div class="col-md-3">
              <h4 class="classic-title"><span>Kategori Informasi</span></h4>
                  <div class="latest-posts-classic" style="background: url(images/folder.png)  no-repeat right bottom;">
                      @foreach($rekap_kategori as $rk)
                       <div class="post-row">
                          <div class="left-meta-post">
                            <div class="post-type hidden-xs"><i class="icon icon-kategori-dokumen"></i></div>
                            <i class="fa fa-file-text-o hidden-md hidden-sm hidden-lg"></i>
                          </div>
                          <h5 class="post-title"><a href="{{URL::to("daftarinformasi/kategori/".$rk->id."/".generate_url($rk->nama))}}">
                          {{$rk->nama}}</a></h5>
                          <div class="post-content">
                            <p class="hidden-xs">{{$rk->jumlah}} Dokumen</p>
                          </div>
                        </div>
                      @endforeach
                 </div>
                 

          <!-- Start Subscribe & Social Links Widget -->
            <div>
              <p>Tidak Menemukan Informasi yang Anda Cari?</p><br>
              <p><a href="{{URL::to("permohonan/ajukanpermohonan")}}" class="btn btn-cyan"><i class="fa fa-paper-plane"></i> Ajukan Permohonan Infomasi</a></p>
              <span class="hidden-lg hidden-sm hidden-md"><br><br></span>
            </div>
              <p>&nbsp;</p>
            <h4 class="classic-title"><span>Jenis Informasi</span></h4>
            <div class="sidebar ">
              <div class="tagcloud">
                 @foreach($rekap_jenis as $rp)
                    <a href="{{URL::to("daftarinformasi/jenis/".$rp->id."/".generate_url($rp->nama))}}">
                          <i class="fa fa-folder-o"></i> 
                          {{$rp->nama}} <small>({{$rp->jumlah}})</small>
                        </a>
                  @endforeach
              </div>
            </div>
                
            <h4 class="classic-title"><span>Layanan Informasi</span></h4>
            <!-- Start Latest Posts -->
            <div class="latest-posts-classic" style="background: url(images/prosedur.png)  no-repeat right top;">
              <?php
                $prosedur = DB::table('prosedur')->orderby('id')->get();
              ?>
              @foreach($prosedur as $p)
              <!-- Post 1 -->
              <div class="post-row">
                <div class="left-meta-post">
                  <div class="post-type hidden-xs"><i class="icon icon-layanan"></i></div>
                  <i class="fa fa-hand-o-right hidden-md hidden-sm hidden-lg"></i>
                </div>
                <h5 class="post-title"><a href="{{URL::to("prosedur/".$p->id."/".generate_url($p->nama))}}">{{$p->nama}}</a></h5>
                <div class="post-content">
                  <p class="hidden-xs">Tata Cara dan Mekanisme Pelayanan Informasi</p>
                </div>
              </div>
              @endforeach

              <div class="post-row">
                <div class="left-meta-post">
                  <div class="post-type hidden-xs"><i class="icon icon-layanan"></i></div>
                  <i class="fa fa-hand-o-right hidden-md hidden-sm hidden-lg"></i>
                </div>
                <h5 class="post-title"><a href="{{URL::to("permohonan/ajukanpermohonan")}}">Permohonan Informasi</a></h5>
                <div class="post-content">
                  <p class="hidden-xs">Mengajukan Permohonan Informasi ke PPID</p>
                </div>
              </div>
              <div class="post-row">
                <div class="left-meta-post">
                  <div class="post-type hidden-xs"><i class="icon icon-layanan"></i></div>
                  <i class="fa fa-hand-o-right hidden-md hidden-sm hidden-lg"></i>
                </div>
                <h5 class="post-title"><a href="{{URL::to("permohonan/statuspermohonan")}}">Status Permohonan Informasi</a></h5>
                <div class="post-content">
                  <p class="hidden-xs">Cek Status Permohonan Informasi</p>
                </div>
              </div>
            </div>

            <p>&nbsp;</p>
                
              
               <h4 class="classic-title"><span>Statistik</span></h4>
                <table class="table noborder table-condensed">
                    <tr>
                      <td style="width: 80%">
                        Jumlah Dokumen
                      </td>
                      <td align="center">
                        {{$statistik["jumlah_dokumen"]}}
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 80%">
                        Jumlah Permohonan
                      </td>
                      <td align="center">
                        {{$statistik["jumlah_permohonan"]}}
                      </td>
                    </tr>                   
                </table>
                
                <h4 class="classic-title"><a href="{{URL::to('semua-video')}}"><b>Gallery Video </b><i class="fa fa-angle-right"></i></a></h4>
                    <?php
                    $video = DB::table('gallery_video')->orderby('created_at','desc')->limit(4)->skip(0)->get();
                    ?>
                    @foreach($video as $pt)
                     <div class="col-md-6">
                        <a href="https://www.youtube.com/watch?v={{$pt->embed_id}}" class="view-video">
                            <span class="thumb-info thumb-info-lighten"> 
                                <span class="thumb-info-wrapper"> 
                                <div style="position:relative;height:0;padding-bottom:56.25%"> 
                                <img src="http://img.youtube.com/vi/{{$pt->embed_id}}/hqdefault.jpg" class="img-responsive" style="left:0;right:0;top:0;bottom:0"> 
                                    <span class="thumb-info-action"> 
                                        <span class="thumb-info-action-icon"><i class="fa fa-play"></i></span> 
                                    </span> 
                                </div> 
                                </span> 
                            </span> 
                            <div style="height:50px"> 
                                <p style="text-align:center"><small>{{cuttext50($pt->judul)}}</small></p> 
                            </div> 
                        </a>    
                    </div>
                    @endforeach
                
            <!-- End Latest Posts -->
          </div>
          <!-- .col-md-6 -->
          <!-- .col-md-6 -->
        </div>
        <!-- .row -->
      </div>
      <!-- .container -->

      <!-- End News & Skill Section -->
      <!-- Divider -->
      <div class="hr1 margin-60"></div>

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