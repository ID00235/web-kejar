<hr class="hidden-lg">
<p class="hidden-xs">&nbsp;</p>
<div class="sidemenu">
    <h4 class="classic-title"><span>Kepala Kejaksaan Negeri</span></h4>
   
</div>
<hr class="hidden-lg">
<div class="sidemenu">
    <h4 class="classic-title"><span>Pejabat Struktural</span></h4>
   
</div>
<hr class="hidden-lg">
<div class="sidemenu">
    <h4 class="classic-title"><span>Profil</span></h4>
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
    <h4 class="classic-title"><span>Website Terkait</span></h4>
    <ul class="listlink">
      <li>
            <a href="http://http://www.kejati-jambi.go.id/" target="_blank">kejaksaan.go.id</a><br>
            <small>Website Kejaksaan Agung</small>
      </li>
      <li>
            <a href="http://http://www.kejati-jambi.go.id/" target="_blank">www.kejati-jambi.go.id</a><br>
            <small>Website Kejaksaan Tinggi Jambi</small>
      </li>
      <li>
            <a href="http://www.batangharikab.go.id" target="_blank">www.batangharikab.go.id</a><br>
            <small>Website Pemerintah Kab. Batang Hari</small>
      </li>
    </ul>
</div>
<p class="hidden-xs">&nbsp;</p>