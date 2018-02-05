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
                <div class="panel-title"><i class="fa fa-plus"></i> Halaman Berita Baru</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/berita/")}}" data-rel="reload" class="btn btn-default btn-sm btn-outline"><i class="fa fa-angle-left"></i> Index Berita</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $judul = old('judul') ? old('judul'):"";
                $isi = old('isi') ? old('isi'):"";
                $tanggal = old('tanggal') ? old('tanggal'):"";
                $title_gambar = old('title_gambar') ? old('title_gambar'):"";
            ?>
                
                <form action="{{URL::to('admin/berita/insert')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('judul')) has-error @endif">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul"  value="{{$judul}}" placeholder="Masukan Judul" type="text">
                                    @if($errors->has('judul'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('isi')) has-error @endif">
                                    <label>Isi Berita</label>
                                    <textarea id="editor" name="isi">{{$isi}}</textarea>
                                    @if($errors->has('isi'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('tanggal')) has-error @endif">
                                    <label>Tanggal Posting</label>
                                    <input class="date-input form-control"  value="{{$tanggal}}" name="tanggal" placeholder="Tanggal Posting" type="text">
                                    @if($errors->has('tanggal'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('gambar')) has-error @endif">
                                    <label>Pilih File Gambar (<small>Resolusi disarankan 600x400 pixel</small>)</label>
                                    @if($errors->has('gambar')) <small class="text-danger"><br>{{$errors->first('gambar')}}</small>@endif
                                    <input  class="btn btn-default" type="file" name="gambar" accept=".png,.jpg,.bmp,.jpeg" />
                                    @if($errors->has('gambar'))
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    @endif
                                </div>
                            </div>     
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Caption Gambar (Optional)</label>
                                    <input class="form-control" name="title_gambar"  value="{{$title_gambar}}" placeholder="Masukan Caption Gambar" type="text">
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
