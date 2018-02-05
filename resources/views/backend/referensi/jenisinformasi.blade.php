@extends('backend.layout')
@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-server"></i> Referensi <small>Jenis Informasi</small></div>
					<div class="panel-options">
						<a href="{{URL::to("admin/referensi/jenisinformasi/create")}}" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Baru</a>
					</div>
				</div>
  				<div class="panel-body">
  					<table id="tabel1" class="table table-striped table-condensed table-hover">
		              <thead>
		                <tr>
		                  <th width="30px">No</th>
		                  <th>Nama Jenis Informasi</th>
		                  <th width="150px" style="text-align: center"  ></th>
		                </tr>
		              </thead>
		              <tbody>
		              	<?php
		                	$no=0;
		                ?>
		                @foreach($jenisinformasi as $jn)
		                <?php
		                	$no++;
		                	$id = $jn->id;
		                	$cid = Crypt::encrypt($id );
		                	$nama = $jn->nama;
		                	//jumlah dokumen
		                	$jdk = DB::table("dokumen")->where("jenis",$id)->count();
		                ?>
		                	<tr>
		                		<td>{{$no}}</td>
		                		<td>{{$nama}}</td>
		                		<td align="center">
		                			<a href="{{URL::to("admin/referensi/jenisinformasi/edit/$cid")}}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
		                			@if($jdk>0)
		                			<button class="btn btn-xs btn-disable" disabled><i class="fa fa-trash"></i></button>
		                			@else
		                			<button href="#" data-id="{{$cid}}" data-nama="{{$nama}}" class="btn-del btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></button>
		                			@endif
		                		</td>
		                	</tr>
		                @endforeach
		              </tbody>
		            </table>
  				</div>
  			</div>
        </div>
    </div>
    <form action="{{URL::to('admin/referensi/jenisinformasi/delete')}}" method="post" id="form-delete">
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">
    <input type="hidden" name="post_id"  id="post_id">
    </form>
    <script type="text/javascript">
		$(function(){
				  $('#tabel1').DataTable({
				  	 dom: 'Bfrtip',
				  	"order": [[ 0, "asc" ]],
				  	"lengthMenu": [[15,25, 50, 100],[15,25, 50, 100]],
				  	"buttons": [{extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Cetak Excel',className:'btn btn-default btn-sm'}]
				   });
			     @if(Session::has('notice'))
			    	Notify.showNotice('{{Session::get('notice')}}');
			     @endif

			     @if($errors->has())
			    	Notify.showAlert('Terjadi Kesalahan Periksa Isian Form');
			     @endif

			     $(".btn-del").on("click",function(){
			     	var post_id = $(this).attr('data-id');
			     	var nama = $(this).attr('data-nama');
			     	$("#post_id").val(post_id);

			     	    bootbox.confirm({
				        message: "Anda Yakin Ingin Menghapus Jenis Informasi : <br><strong>" + nama + "</strong>",
				        buttons: {
				            confirm: {
				                label: 'Ya, Hapus',
				                className: 'btn-danger'
				            },
				            cancel: {
				                label: 'Batalkan',
				                className: 'btn-default'
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
@endsection

