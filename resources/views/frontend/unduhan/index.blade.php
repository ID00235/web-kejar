@extends('frontend.layout')
@section("pagetitle","Unduhan")
@section("subpage","PPID Kabupaten Batang Hari")
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

        <div class="col-md-8">
        	<h4 class="classic-title"><span>File Unduhan</span></h4>
            <?php
            $unduhan = DB::table('spesial_konten')->get();
            ?>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <td style="width: 25px;"></td>
                  <td></td>
                  <td style="width: 30px;"></td>
                </tr>
              </thead>
              <?php $no=1;?>
              @foreach($unduhan as $ud)
              <tr>
                <td>{{$no}}</td>
                <td>{{$ud->nama}}</td>
                <td><center><a href="{{URL::to("download")."/".$ud->filename}}" class="btn btn-xs btn-default">
                <i class="fa fa-download"></i> Download</a></center></td>
              </tr>
              <?php $no++;?>
              @endforeach
            </table>
        </div>

        <div class="col-md-4 hidden-xs">
            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Kontak PPID Kab. Batang Hari</span></h4>
            <!-- Divider -->
            <div class="hr1" style="margin-bottom:10px;"></div>
            <!-- Info - Icons List -->
            <ul class="icons-list">
              <li><i class="fa fa-globe">  </i> <strong>Alamat:</strong><br> {{$setting->alamat}}</li>
              <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong><br> {{$setting->email}}</li>
              <li><i class="fa fa-phone"></i> <strong>Phone:</strong><br> {{$setting->telepon}}</li>
            </ul>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:15px;"></div>

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Jam Kerja</span></h4>

            <!-- Info - List -->
            <ul class="list-unstyled">
              <li><strong>Senin - Kamis</strong> :  07:30 - 16:00 WIB</li>
              <li><strong>Jum'at</strong> :  07:30 - 11:30 WIB</li>
            </ul>

          </div>

 		</div>
    </div>
 	</div>
@endsection

@section("javascript")
      @@parent
      <script type="text/javascript">
      $(function(){
          @if($errors->has())
            Notify.showAlert('Isian Formulir Permohonan Belum Lengkap!');
          @endif
      })
      </script>
     
@endsection