<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
<section class="first  hidden-xs">
    <div class="container">
      <div class="container-flyer ">
        <div class="col-sm-4 front-form">
          <div class="row slider-content">                        
            <p> 
            <h3 id="animated-text" class="text-white hidden">
             {{$header->kutipan}}
            </h3>
            </p>
            <br>          
          </div>       
        </div>        
      </div>  
    </div>
</section>
<section>
  <div class="row hidden-lg">
        <img src="{{asset('header/'.$header->gambar)}}" class="img img-responsive">
      </div>
</section>
<style type="text/css">
  .first {
    background:url({{asset("header/".$header->gambar)}}) no-repeat center center;background-size:cover;
  }
</style>
  