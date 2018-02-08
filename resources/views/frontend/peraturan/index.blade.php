@extends('frontend.layout')
@section("pagetitle","Peraturan Perundang-undangan")
@section("subpage","")
@section("pageslider")
@include("frontend.pagetop")
@endsection
@section("content")
    <!-- Start News & Skill Section -->
    <link href="{{asset('vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

    <div class="container">
      <div class="page-content">
        <div class="row">
        <div class="col-md-1">
              <div class="share-it"></div>
              <div class="mb-20"></div>
        </div>
        <div class="col-md-7">
            <div class="blog-post gallery-post">
                  <div class="post-title">
                      Peraturan dan Perundang-undangan
                  </div>
                  <div class="post-isi">
                      <table id="tabel1" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Nama Peraturan</th>
                      <th>Tahun</th>
                      <th>Download</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                      @foreach($peraturan as $row)
                        <?php  $no++;?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$row->nama}}</td>
                          <td>{{$row->tahun}}</td>
                          <td><a href="{{url('upload-peraturan/'.$row->file_name)}}">Download</a></td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                  </div>
            </div>   
        </div>       
        <div class="col-sm-4 col-xs-12" style="padding-left: 20px !important; padding-right: 20 !important;">
          @include('frontend.sidebar')
        </div>

 		</div>
    </div>
 	</div>
<script src="{{asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
      $(function(){
          $('#tabel1').DataTable({
             dom: 'Bfrtip',
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[15,25, 50, 100],[15,25, 50, 100]],
           });
      })
</script>
@endsection
