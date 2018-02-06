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
            <a href="{{URL::to('/admin/profil')}}"><i class="fa fa-building-o"></i> Profil Kejaksaan</a>
        </li>
        <li @if($route=="organisasi") class="current" @endif>
            <a href="{{URL::to('/admin/organisasi')}}"><i class="fa fa-building-o"></i> Organisasi Kejaksaan</a>
        </li>
        <li @if($route=="sarana") class="current" @endif>
            <a href="{{URL::to('/admin/sarana')}}"><i class="fa fa-building-o"></i> Sarana Kejaksaan</a>
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
        <li>
            <a href="{{URL::to('')}}" target="_blank">
            <i class="fa fa-external-link" aria-hidden="true"></i>Visit Website</a>
        </li>
        
    </ul>
</div>