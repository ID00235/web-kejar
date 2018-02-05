@extends('backend.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Detail Berita</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/berita")}}" data-rel="reload" class="btn btn-default btn-outline btn-sm"><i class="fa fa-angle-left"></i> Ke Index Berita</a>
                  <a href="{{URL::to("admin/berita/edit/".$record->gethashid())}}" data-rel="reload" class="btn btn-success btn-outline btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <small>Di Posting: <i class="fa fa-calendar"></i> {{tanggal_singkat_indo($record->tanggal)}}</small>
                <h4>{{$record->judul}}</h4><br>
                <div class = "thumbnail">
                     <img width="100%" src = "{{asset('berita/'.$record->gambar)}}" class="img-responsive">
                     <div class = "caption text-center"><p>{{$record->title_gambar}}</p></div>
                </div>
                <?=$record->isi;?>
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
