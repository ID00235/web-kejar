@extends('backend.layout')
@section('content')
<?php
$direktori  = $dataangka->id;
?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-file-text-o"></i> Detail Halaman</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/dataangka")}}" data-rel="reload" class="btn btn-default btn-sm btn-outline"><i class="fa fa-angle-left"></i> Ke Index Halaman</a>
                  <a href="{{URL::to("admin/dataangka/edit/".$dataangka->gethashid())}}" data-rel="reload" class="btn btn-success btn-sm  btn-outline"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-striped " style="border: none;">
                    <tr><td><b>Nama Halaman</b></td></tr>
                    <tr>
                        <td>{{$dataangka->nama}}</td>
                    </tr>
                    <tr><td><b>Deskripsi</b></td></tr>
                    <tr>
                        <td><?=$dataangka->isi;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<form action="{{URL::to('admin/dip/fileprofil/delete')}}" method="post" id="form-delete">
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">
    <input type="hidden" name="id_file"  id="post_id">
<form>
<script type="text/javascript">
    $(function(){
         @if(Session::has('notice'))
            Notify.showNotice('{{Session::get('notice')}}');
         @endif

         @if($errors->has())
            Notify.showAlert('Terjadi Kesalahan Upload Files');
         @endif

         $(".btn-del-file").on("click",function(){
                    var post_id = $(this).attr('data-id');
                    var nama = $(this).attr('data-nama');
                    $("#post_id").val(post_id);

                        bootbox.confirm({
                        message: "Anda Yakin Ingin Menghapus Gambar?",
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