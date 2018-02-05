<?php
$header = DB::table('header')->where('aktif',1)->inRandomOrder()->get();
$header = $header[0];
?>
<div class="page-banner">
    <div class="container">
    <div class="col-md-6">
      <h2 id="animated-text" class="hidden">
            Dokumen Informasi Publik
      </h2>
      <small>PPID Kabupaten Batang Hari</small>
      </div>
      <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="{{URL::to("")}}">Home</a></li>
              <li>@section("subtitle") @show</li>
            </ul>
          </div>
    </div>
  </div>

  