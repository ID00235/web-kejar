@extends('backend.layout')
@section('javascript')
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Edit Halaman</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/informasi/")}}" data-rel="reload" class="btn btn-outline btn-default btn-sm"><i class="fa fa-angle-left"></i> Kembali Ke Index </a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):$record->nama;
                $isi = old('isi') ? old('isi'):$record->isi;
            ?>
               
                <form action="{{URL::to('admin/informasi/update/'.Crypt::encrypt($record->id))}}" method="POST">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama Halaman</label>
                                    <input class="form-control" name="nama"  value="{{$nama}}" placeholder="Masukan Nama Profil" type="text">
                                    @if($errors->has('nama'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('isi')) has-error @endif">
                                    <label>Isi/Deskripsi</label>
                                    <textarea id="editor" name="isi">{{$isi}}</textarea>
                                    @if($errors->has('isi'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>                     
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-outline btn-sm" type="submit">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                            </div>
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
             CKEDITOR.replace( 'editor', {
                extraPlugins: 'image2,justify',
                filebrowserImageUploadUrl: '{{URL::to('admin/upload-gambar')}}',
             });
        })
</script>
@endsection
