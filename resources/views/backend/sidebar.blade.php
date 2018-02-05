<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li @if($route=="home")class="current" @endif>
            <a href="{{URL::to('/admin/home')}}"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li @if($route=="berita")class="current" @endif>
            <a href="{{URL::to('/admin/berita')}}"><i class="fa fa-newspaper-o"></i> Berita</a>
        </li>
        <li @if($route=="profil") class="current" @endif>
            <a href="{{URL::to('/admin/profil')}}"><i class="fa fa-building-o"></i> Profil Kecamatan</a>
        </li>
        <li @if($route=="kelurahan") class="current" @endif>
            <a href="{{URL::to('/admin/kelurahan')}}"><i class="fa fa-ticket"></i> Kelurahan/Desa</a>
        </li>
        <li @if($route=="dataangka") class="current" @endif>
            <a href="{{URL::to('/admin/dataangka')}}"><i class="fa fa-at"></i> Data Umum</a>
        </li>
        <li @if($route=="informasi") class="current" @endif>
            <a href="{{URL::to('/admin/informasi')}}"><i class="fa fa-file-o"></i> Halaman Info</a>
        </li>
        <li @if($route=="gallery") class="current" @endif>
            <a href="{{URL::to('/admin/gallery')}}"><i class="fa fa-image"></i> Gallery Photo</a>
        </li>
        <li @if($route=="header") class="current" @endif>
            <a href="{{URL::to('/admin/header')}}"><i class="fa fa-ellipsis-h"></i> Header Website</a>
        </li>       
        <li @if($route=="setting")class="current" @endif>
            <a href="{{URL::to('/admin/setting')}}">
            <i class="fa fa-info-circle" aria-hidden="true"></i>Informasi Kontak</a>
        </li>
        <li @if($route=="agenda")class="current" @endif>
            <a href="{{URL::to('/admin/agenda')}}"><i class="fa fa-calendar"></i> Agenda</a>
        </li>
        <li>
            <a href="{{URL::to('')}}" target="_blank">
            <i class="fa fa-external-link" aria-hidden="true"></i>Visit Website</a>
        </li>
        
    </ul>
</div>