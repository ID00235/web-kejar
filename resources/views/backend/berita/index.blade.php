@extends('backend.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Halaman Berita</div>
            </div>
            <div class="panel-body">
            	<a href="{{URL::to("admin/berita/baru")}}" data-rel="reload" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-plus"></i> Berita Baru</a>
                <table id="tabel1" class="table table-striped table-condensed table-hover">
		              <thead>
		                <tr>
		                  <th width="30px">No</th>
		                  <th width="60%">Judul Berita</th>
		                  <th>Posting</th>
		                  <th width="150px" style="text-align: center"  ></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php $no=0;?>
		              		@foreach($berita as $row)
		              			<?php  $no++;?>
		              			<tr>
		              				<td>{{$no}}</td>
		              				<td><a href="{{URL::to('admin/berita/detail/'.$row->gethashid())}}">{{$row->judul}}</a></td>
		              				<td>{{$row->tanggal}}</td>
		              				<td>
		              					<a href="{{URL::to("admin/berita/edit/".$row->gethashid())}}" class="btn btn-sm btn-outline btn-success" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
		              					<button href="#" data-id="{{$row->gethashid()}}" data-judul="{{$row->judul}}" class="btn-del btn  btn-sm btn-outline btn-danger" title="Hapus"><i class="fa fa-times"></i> Hapus</button>
		              				</td>
		              			</tr>
		              		@endforeach
		              </tbody>
		            </table>
            </div>
        </div>
    </div>
</div>
<form action="{{URL::to('admin/berita/delete')}}" method="post" id="form-delete">
    {{csrf_field()}}
    <input type="hidden" name="post_id"  id="post_id">
</form>
<script type="text/javascript">
	$(function(){
         @if(Session::has('notice'))
            Notify.showNotice('{{Session::get('notice')}}');
         @endif
         $('#tabel1').DataTable({
		  	 dom: 'Bfrtip',
		  	"order": [[ 0, "asc" ]],
		  	"lengthMenu": [[15,25, 50, 100],[15,25, 50, 100]],
		   });
        
		$(".btn-del").on("click",function(){
	     	var post_id = $(this).attr('data-id');
	     	var judul = $(this).attr('data-judul');
	     	$("#post_id").val(post_id);

	     	    bootbox.confirm({
		        message: "Anda Yakin Ingin Menghapus Berita: <br><strong>" + judul + "</strong>",
		        buttons: {
		            confirm: {
		                label: 'Ya, Hapus',
		                className: 'btn-danger  btn-outline'
		            },
		            cancel: {
		                label: 'Batalkan',
		                className: 'btn-default  btn-outline'
		            }
		        },
		        callback: function (result) {
		        	if(!result) return;
		        	$("#form-delete").submit();
		        	
		        }
		    });
	     })

     })
</script>

<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Informasi PPID Pembantu</h4>
      </div>
      <div class="modal-body" id="body-detail">
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
