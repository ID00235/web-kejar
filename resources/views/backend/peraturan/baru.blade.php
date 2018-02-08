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
                <div class="panel-title"><i class="fa fa-plus"></i> Upload Peraturan Baru</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/peraturan/")}}" data-rel="reload" class="btn btn-outline btn-default btn-sm"><i class="fa fa-angle-left"></i> Kembali Ke Index Peraturan</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):"";
                $tahun = old('tahun') ? old('tahun'):"";

            ?>
                <form action="{{URL::to('admin/peraturan/store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama</label>
                                    <input class="form-control" required name="nama"  value="{{$nama}}" placeholder="Masukan Nama Peraturan" type="text">
                                    @if($errors->has('nama'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('tahun')) has-error @endif">
                                    <label>Tahun</label>
                                    <input class="form-control" required name="tahun"  value="{{$tahun}}" placeholder="Masukan Tahun Peraturan" type="text">
                                    @if($errors->has('tahun'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>     
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('file_name')) has-error @endif">
                                    <label>Upload File (Format PDF)</label>
                                    <input required  class="btn btn-default" type="file" name="file_name" accept=".pdf" />
                                    @if($errors->has('file_name'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>                                      
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm btn-outline" type="submit">
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
        })
</script>
@endsection
