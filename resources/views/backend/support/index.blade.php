@extends('backend.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-at"></i> Spesial Konten</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/support/baru")}}" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Upload Baru</a>
                </div>
            </div>
            <div class="panel-body">
                <table id="tabel1" class="table table-striped table-hover">
		              <thead>
		                <tr>
		                  <th >ID</th>
		                  <th width="70%">Nama File</th>
		                  <th width="25%" align="right">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              
		              </tbody>
		            </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="{{URL::to('admin/support/update')}}" method="POST" >
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Spesial Konten</h4>
	      </div>
	      <div class="modal-body" id="body-detail">
	      		 {{csrf_field()}}
	      		 <input type="hidden" name="id_edit"  id="post_edit">
	        	<div class="row">
	        		<div class="col-md-12">
		                <div class="form-group">
		                    <label>Nama Dokumen/File/Konten</label>
		                    <input class="form-control" name="nama" id="post_nama" value="" placeholder="Masukan Nama " type="text">
		                </div>
		            </div>   
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="Submit" class="btn btn-success">Simpan</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>

<form action="{{URL::to('admin/support/delete')}}" method="post" id="form-delete">
    {{csrf_field()}}
    <input type="hidden" name="post_id"  id="post_id">
</form>
<script type="text/javascript">
	$(function(){
         @if(Session::has('notice'))
            Notify.showNotice('{{Session::get('notice')}}');
         @endif
         @if($errors->has())
                Notify.showAlert('<b>Terjadi Kesalahan</b>,  Periksa Inputan Form');
             @endif
         var datatabel1 = $('#tabel1').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "{{URL::to('admin/support/datatable')}}",
            "aoColumns": [
                        { mData: 'id', bSortable:true },
                        { mData: 'nama', bSortable:true },
                        { mData: 'action' , bSortable:true},
                ],
            "drawCallback": function( settings ) {
                onDeleteClick();
                onEditClick();
            }
        });

        var onEditClick = function(){
        	$(".btn-edit").on("click",function(){
		     	var post_id = $(this).attr('data-id');
		     	var nama = $(this).attr('data-nama');
		     	$("#post_edit").val(post_id);
		     	$("#post_nama").val(nama);
		     	$("#modal-edit").modal('show');
		     });
        }

		var onDeleteClick = function(){

			$(".btn-del").on("click",function(){
		     	var post_id = $(this).attr('data-id');
		     	var nama = $(this).attr('data-nama');
		     	$("#post_id").val(post_id);

		     	    bootbox.confirm({
			        message: "Anda Yakin Ingin Menghapus File Berikut: <br><strong>" + nama + "</strong>",
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
		}

     })
</script>
@endsection
