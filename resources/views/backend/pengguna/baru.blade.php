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
                <div class="panel-title"><i class="fa fa-user"></i> Entri Admin Operator</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/pengguna/")}}" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Pengguna</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $username = old('username') ? old('username'):"";
                $nama = old('nama') ? old('nama'):"";
                $email = old('email') ? old('email'):"";
                $usertype = old('usertype') ? old('usertype'):"operator";
                $ppid_pembantu = old('ppid_pembantu') ? old('ppid_pembantu'):"";
            ?>
                <form action="{{URL::to('admin/pengguna/store')}}" method="POST">
                        {{csrf_field()}}
                        Isian Informasi Pengguna
                        <hr>
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('username')) has-error @endif">
                                    <label>Username</label>
                                    <input class="form-control" name="username"  value="{{$username}}" placeholder="Masukan Username"
                                     type="text">
                                    @if($errors->has('username'))
                                    <span class="help-block">{{$errors->first("username")}}</span>
                                    @endif
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
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label>Alamat Email Aktif</label>
                                    <input class="form-control" name="email"  value="{{$email}}" placeholder="Masukan Email"
                                     type="text">
                                    @if($errors->has('email'))
                                    <span class="help-block">Kolom Ini Harus Diisi dengan Email yang Valid</span>
                                    @endif
                                </div>
                            </div>    
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipe Pengguna</label>
                                    <select class="form-control select2" name="usertype" id="tipe_pengguna">
                                        <option value="operator">Operator</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                            </div>
                            
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
                        </fieldset>
                        <hr>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>

                                <button class="btn btn-default btn-sm pull-right" type="reset">
                                    <i class="fa fa-refresh"></i>
                                    Reset
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
            $(".select2[name=usertype]").val("{{$usertype}}");  
              $(".select2[name=ppid_pembantu]").val("{{$ppid_pembantu}}");  
        })
</script>
@endsection
