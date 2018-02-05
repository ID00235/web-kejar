<?php
$route  = "";
?>
@extends('frontend.layout-error')
@section("pagetitle","Error 404 Page Not Found")
@section("subpage","Kecamatan Batin XXIV")
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
            <p>&nbsp;</p>
           <center>
           <img src="{{asset('images/404.png')}}" height="80"> 
           <p>&nbsp;</p>
           <a href="{{URL::to('')}}" class="btn btn-cyan"><i class="fa fa-home"></i> Ke Halaman Depan</a>
           </center> 
            <p>&nbsp;</p>
        </div>
        </div>
    </div>
    </div>
@endsection
