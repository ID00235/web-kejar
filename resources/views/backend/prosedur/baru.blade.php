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
                <div class="panel-title"><i class="fa fa-check"></i> Entri Prosedur Layanan</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/prosedur/")}}" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Prosedur</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):"";
                $isi = old('isi') ? old('isi'):"";

            ?>
                <form action="{{URL::to('admin/prosedur/store')}}" method="POST">
                        {{csrf_field()}}
                        Isian Informasi Prosedur
                        <hr>
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama"  value="{{$nama}}" placeholder="Masukan Nama Prosedur" type="text">
                                    @if($errors->has('nama'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('isi')) has-error @endif">
                                    <label>Deskripsi</label>
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
                                <button class="btn btn-success btn-sm" type="submit">
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
                extraPlugins: 'image2',
                filebrowserImageUploadUrl: '{{URL::to('admin/upload-gambar')}}',
             });

            
        })
</script>
@endsection
