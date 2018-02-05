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
                <div class="panel-title">Edit Halaman Kelurahan/Desa</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/kelurahan/")}}" data-rel="reload" class="btn btn-outline btn-default btn-sm"><i class="fa fa-angle-left"></i> Kembali Ke Index</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):$record->nama;
                $tipe = old('tipe') ? old('tipe'):$record->tipe;
                $alamat_kantor = old('alamat_kantor') ? old('alamat_kantor'):$record->alamat_kantor;
                $nama_lurah = old('nama_lurah') ? old('nama_lurah'):$record->nama_lurah;
                $pejabat_kelurahan = old('pejabat_kelurahan') ? old('pejabat_kelurahan'):$record->pejabat_kelurahan;
            ?>
               <form action="{{URL::to('admin/kelurahan/update/'.Crypt::encrypt($record->id))}})}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <fieldset>

                             <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Jenis Kelurahan Atau Desa</label> <br>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipe" @if($tipe=='kelurahan') checked="checked"  @endif value="kelurahan"> Kelurahan
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipe" @if($tipe=='desa')  checked="checked"  @endif value="desa"> Desa
                                    </label>
                                    @if($errors->has('tipe'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama"  value="{{$nama}}" placeholder="Masukan Nama Kelurahan" 
                                    type="text">
                                    @if($errors->has('nama'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Alamat Kantor</label>
                                    <input class="form-control" name="alamat_kantor"  value="{{$alamat_kantor}}" placeholder="Masukan Alamat Kantor Kelurahan" 
                                    type="text">
                                    @if($errors->has('alamat_kantor'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group @if($errors->has('gambar')) has-error @endif">
                                    <label>Ganti Photo Kantor Lurah/Desa (<small>Resolusi disarankan 640px x 480px</small>)</label>
                                    @if($errors->has('photo_kantor')) <small class="text-danger"><br>{{$errors->first('photo_kantor')}}</small>@endif
                                    <input  class="btn btn-default" type="file" name="photo_kantor" accept=".png,.jpg,.bmp,.jpeg" />
                                    @if($errors->has('photo_kantor'))
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    @endif
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama Lurah/Kades</label>
                                    <input class="form-control" name="nama_lurah"  value="{{$nama_lurah}}" placeholder="Masukan Nama Pejabat Lurah" 
                                    type="text">
                                    @if($errors->has('nama_lurah'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group @if($errors->has('gambar')) has-error @endif">
                                    <label>Ganti Photo Lurah/Kades (<small>Resolusi disarankan 170px × 255px</small>)</label>
                                    @if($errors->has('photo_lurah')) <small class="text-danger"><br>{{$errors->first('photo_lurah')}}</small>@endif
                                    <input  class="btn btn-default" type="file" name="photo_lurah" accept=".png,.jpg,.bmp,.jpeg" />
                                    @if($errors->has('photo_lurah'))
                                    <span class="help-block">Gambar Belum Dipilih!</span>
                                    @endif
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('isi')) has-error @endif">
                                    <label>Pejabat Kelurahan/Desa</label>
                                    <textarea id="editor" name="pejabat_kelurahan">{{$pejabat_kelurahan}}</textarea>
                                    @if($errors->has('pejabat_kelurahan'))
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
             CKEDITOR.replace( 'editor', {
                extraPlugins: 'image2',
                filebrowserImageUploadUrl: '{{URL::to('admin/upload-gambar')}}',
             });
        })
</script>
@endsection
