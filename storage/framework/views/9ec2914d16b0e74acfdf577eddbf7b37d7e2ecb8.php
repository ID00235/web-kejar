<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
<section class="first">
    <div class="container">
      <div class="container-flyer">
        <div class="col-sm-4 front-form">
          <div class="row slider-content">                        
            <p> 
            <h3 id="animated-text" class="text-white hidden">
             <?php echo e($header->kutipan); ?>

            </h3>
            </p>
            <br>
            <div class="widget widget-search">
              <form action="<?php echo e(URL::to('daftarinformasi')); ?>">
                <input placeholder="Cari Dokumen Informasi.." type="search" class="input-transparent" name="keyword">
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>            
          </div>       
        </div>        
      </div>  
    </div>
  </section>
<style type="text/css">
  .first {
    background:url(<?php echo e(asset("header/".$header->gambar)); ?>) no-repeat center center;background-size:cover;
  }
</style>
  