<hr class="hidden-lg">
<p class="hidden-xs">&nbsp;</p>
<div class="sidemenu">
    <p class="sidetitle">
      <center><img src="{{asset('images/menu3.png')}}" class="hidden-xs"></center>
    </p>
    <h4 class="classic-title hidden-lg hidden-md"><span>Kepala Kejaksaan Negeri</span></h4>
   
</div>
<hr class="hidden-lg">
<div class="sidemenu">
    <p class="sidetitle">
      <center><img src="{{asset('images/menu3.png')}}" class="hidden-xs"></center>
    </p>
    <h4 class="classic-title hidden-lg hidden-md"><span>Pejabat Struktural</span></h4>
   
</div>
<hr class="hidden-lg">
<div class="sidemenu">
    <p class="sidetitle">
      <center><img src="{{asset('images/menu4.png')}}"  class="hidden-xs"></center>
    </p>
    <h4 class="classic-title hidden-lg hidden-md"><span>Profil</span></h4>
    <?php
    $profil = DB::table('profil')->select('id','nama')->get();
    ?>
    <ul class="listmenu">
    @foreach($profil as $p)
      <?php
              $url = URL::to("profil/".$p->id."/".generate_url($p->nama));
          ?>
      <li><a href="{{$url}}">{{$p->nama}}</a></li>
    @endforeach
    </ul>
</div>
<hr class="hidden-lg">
<div class="sidemenu">
    <p class="sidetitle">
      <center><img src="{{asset('images/link-menu.png')}}"  class="hidden-xs"></center>
    </p>
    <h4 class="classic-title hidden-lg hidden-md"><span>Website Terkait</span></h4>
    <ul class="listlink">
      <li>
            <a href="http://www.batangharikab.go.id" target="_blank">www.batangharikab.go.id</a><br>
            <small>Website Pemerintah Kab. Batang Hari</small>
      </li>
      <li>
            <a href="http://dprd.batangharikab.go.id" target="_blank">dprd.batangharikab.go.id</a><br>
            <small>Website DPRD Kab. Batang Hari</small>
      </li>
      <li>
            <a href="http://ppid.batangharikab.go.id" target="_blank">ppid.batangharikab.go.id</a><br>
            <small>PPID Kab. Batang Hari</small>
      </li>
    </ul>
</div>
<p class="hidden-xs">&nbsp;</p>