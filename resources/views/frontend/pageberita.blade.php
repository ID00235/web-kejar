<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
    <div class="page-banner" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 style="color:#FFF;">Berita</h2>
                    <p style="color:#FFF;">Berita dan Informasi Terbaru</p>
                </div>
            </div>
        </div>
    </div>
