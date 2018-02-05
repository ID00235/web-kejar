<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Pengumuman</h2>
                    <p>Pengumuman dan Informasi Lainnya</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(URL::to("")); ?>">Home</a></li>
                        <li>Pengumuman</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
