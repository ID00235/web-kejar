@extends('backend.layout')
@section('content')
	<?php
		$dataform = array("id"=>Crypt::encrypt($alasankeberatan->id),
				"nama"=>$alasankeberatan->nama,
		);
		if (old('post_id')!=""){
			$dataform = array("id"=>old('post_id'),
					"nama"=>old('nama'),
			);
		}
		
	?>
	<div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-pencil"></i> Edit Alasan Keberatan Atas Informasi</div>
					<div class="panel-options">
						<a href="{{URL::to("admin/referensi/alasankeberatan")}}" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Alasan Keberatan</a>
					</div>
				</div>
  				<div class="panel-body">
  					<form action="{{URL::to('admin/referensi/alasankeberatan/update')}}" method="post">
  						{{csrf_field()}}
  						<input type="hidden" name="post_id" value="{{$dataform['id']}}">
						<fieldset>
							<div class="form-group @if($errors->has('nama')) has-error @endif">
								<label>Nama</label>
								@if($errors->has('nama')) <small class="text-danger"><br>{{$errors->first('nama')}}</small> @endif
								<input class="form-control" name="nama" placeholder="Masukan Nama Alasan Keberatan" 
								value="{{$dataform['nama']}}" type="text">
							</div>
						</fieldset>
						<div>
							<button class="btn btn-success btn-sm" type="submit">
								<i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</form>
  				</div>
  			</div>
        </div>
    </div>
    <script type="text/javascript">
		$(function(){
		     @if($errors->has())
		    	Notify.showAlert('<b>Terjadi Kesalahan</b>,  Periksa Inputan Form');
		     @endif
		})
	</script>
@endsection