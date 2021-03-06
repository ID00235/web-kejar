@extends('backend.layout') @section('content')
<?php
    $n_berita = DB::table('berita')->count();
    $n_profil = DB::table('profil')->count();
    $n_organisasi = DB::table('organisasi')->count();
    $n_sarana = DB::table('sarana')->count();
    $n_gallery = DB::table('gallery_photo')->count();
    $n_peraturan = DB::table('peraturan')->count();
    $n_konsultasi = DB::table('konsultasi')->count();
?>
<div class="row">
    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-newspaper-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Berita</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/berita/')}}" class="btn btn-outline  btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_berita}}</span>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-building-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Halaman Profil Kecamatan</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/profil/')}}" class="btn btn-outline  btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_profil}}</span>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-at green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Halaman Organisasi Kejaksaan</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/organisasi/')}}" class="btn btn-outline  btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_organisasi}}</span>
        </div>
    </div>



</div>
<p>&nbsp;</p>
<div class="row">

    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-university green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Sarana</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/sarana/')}}" class="btn btn-sm btn-outline btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_sarana}}</span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-image green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Gallery Photo dan Video</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/gallery/')}}" class="btn btn-outline  btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_gallery}}</span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-file-o green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Peraturan</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/profil/')}}" class="btn  btn-outline btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_peraturan}}</span>
        </div>
    </div>

    
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-md-4">
        <div class="content-box-large">
            <div class="row">
                <span class="col-md-4"><i class="fa fa-calendar green" style="font-size:4em;"></i></span>
                <span class="col-md-8">
                        <h4> Konsultasi</h4>
                </span>
            </div>
        </div>
        <div class="content-box-footer">
            <a href="{{URL::to('admin/agenda/')}}" class="btn btn-outline  btn-sm btn-default"><i class="fa fa-arrow-circle-right"></i> Lihat Detail</a>
            <span class="badge badge-white pull-right">{{$n_konsultasi}}</span>
        </div>
    </div>
</div>
@endsection
