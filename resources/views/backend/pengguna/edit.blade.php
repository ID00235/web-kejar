@extends('backend.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-user"></i> Edit Informasi Pengguna</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/pengguna/")}}" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Pengguna</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $username = old('username') ? old('username'):$record->username;
                $nama = old('nama') ? old('nama'):$record->nama;
                $email = old('email') ? old('email'):$record->email;
                $usertype = old('usertype') ? old('usertype'):$record->usertype;
            ?>
                <form action="{{URL::to('admin/pengguna/update/'.Crypt::encrypt($record->id))}}" method="POST">
                        {{csrf_field()}}
                        Isian Data Pengguna
                        <hr>
                        {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" readonly="readonly" value="{{$username}}" 
                                     type="text">
                                </div>
                            </div>      
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label>Nama Pengguna (pemegang user)</label>
                                    <input class="form-control" name="nama"  value="{{$nama}}" placeholder="Masukan Nama Pengguna"
                                     type="text">
                                    @if($errors->has('nama'))
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label>Alamat Email Aktif (<small>Untuk Keperluan Verifikasi</small>)</label>
                                    <input class="form-control" name="email"  value="{{$email}}" placeholder="Masukan Username"
                                     type="text">
                                    @if($errors->has('email'))
                                    <span class="help-block">Kolom Ini Harus Diisi dengan Email yang Valid</span>
                                    @endif
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipe Pengguna</label>
                                    <select class="form-control select2" name="usertype">
                                        <option value="operator">Operator</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                  <label><input type="checkbox" value="1" id="ganti_password" name="ganti_password" @if(old('usertype')) checked="checked" @endif>Ganti Password</label>
                                </div>
                            </div>
                            <div id="panel-password">
                                <div class="col-md-12">
                                    <div class="form-group @if($errors->has('password')) has-error @endif">
                                        <label>Password User</label>
                                        <input class="form-control" name="password"  placeholder="Masukan Password"
                                         type="password">
                                        @if($errors->has('password'))
                                        <span class="help-block">Password Tidak Sesuai</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                                        <label>Konfirmasi Password User</label>
                                        <input class="form-control" name="password_confirmation" placeholder="Masukan Konfirmasi Password"
                                         type="password">
                                    </div>
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
             @if(!old('ganti_password')) 
                $("#panel-password").hide();
             @endif

              $(".select2[name=usertype]").val("{{$usertype}}");
              
             $("#ganti_password").change(function() {
                if(this.checked) {
                   $("#panel-password").show();
                }else{
                    $("#panel-password").hide()
                }
            });
        })
</script>
@endsection
