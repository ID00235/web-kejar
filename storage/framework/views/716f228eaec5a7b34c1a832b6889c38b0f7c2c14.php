
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-plus"></i> Entri Permohonan baru (Manual/Offline)</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/permohonan/")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Index Permohonan Informasi</a>
                </div>
            </div>
            <div class="panel-body">
            <?php
                $nama = old('nama') ? old('nama'):"";
                $keterangan = old('isi') ? old('isi'):"";
                $nomor = "";
                $nomor_permohonan = old('nomor_permohonan') ? old('nomor_permohonan'):"";
                $nama_pemohon = old('nama_pemohon') ? old('nama_pemohon'):"";
                $nomor_identitas = old('nomor_identitas') ? old('nomor_identitas'):"";
                $alamat_pemohon = old('alamat_pemohon') ? old('alamat_pemohon'):"";
                $telp_pemohon = old('telp_pemohon') ? old('telp_pemohon'):"";
                $email_pemohon = old('email_pemohon') ? old('email_pemohon'):"";
                $pekerjaan_pemohon = old('pekerjaan_pemohon') ? old('pekerjaan_pemohon'):"";
                $kuasa_pemohon = old('kuasa_pemohon') ? old('kuasa_pemohon') : 0;

                $nama_kuasa = old('nama_kuasa') ? old('nama_kuasa'):"";
                $alamat_kuasa = old('alamat_kuasa') ? old('alamat_kuasa'):"";
                $telp_kuasa = old('telp_kuasa') ? old('telp_kuasa'):"";
                $pekerjaan_kuasa = old('pekerjaan_kuasa') ? old('pekerjaan_kuasa'):"";
                $informasi_tujuan = old('informasi_tujuan') ? old('informasi_tujuan'):"";
                $informasi_diperlukan = old('informasi_diperlukan') ? old('informasi_diperlukan'):"";
                $cara_memperoleh = old('cara_memperoleh') ? old('cara_memperoleh'):"";
                $cara_mendapatkan = old('cara_mendapatkan') ? old('cara_mendapatkan'):"";
                

                $nomor = DB::table('permohonan')->select("nomor")->orderBy("nomor","desc")->first();
                if($nomor){
                  $nomor = $nomor->nomor;
                  $nomor = str_replace("PI","",$nomor);
                  $new_nomor = (int)$nomor + 1;
                  $nomor = "PI".str_pad($new_nomor, 4, "0", STR_PAD_LEFT);
                }else{
                  $nomor="PI0001";
                }

            ?>
                <form action="<?php echo e(URL::to('admin/permohonan/store')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Registrasi Permohonan (Auto)</label>
                                    <input class="form-control"  readonly = "" value="<?php echo e($nomor); ?>" type="text">
                                </div>
                            </div>
                           <h3 class="col-md-12">A. Identitas Pemohonon </h3>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('nama_pemohon')): ?> has-error <?php endif; ?>">
                                    <label>Nama Pemohon</label>
                                    <input class="form-control" name="nama_pemohon" id="nama_pemohon"  value="<?php echo e($nama_pemohon); ?>" placeholder="Masukan Nama Pemohon " type="text">
                                    <?php if($errors->has('nama_pemohon')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('nomor_identitas')): ?> has-error <?php endif; ?>">
                                    <label>Nomor Identitas KTP/SIM Pemohon</label>
                                    <input class="form-control" name="nomor_identitas" id="nomor_identitas"  value="<?php echo e($nomor_identitas); ?>" placeholder="Masukan Nomor Identitas" type="text">
                                    <?php if($errors->has('nomor_identitas')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('alamat_pemohon')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Pemohon</label>
                                    <input class="form-control" id="alamat_pemohon"  name="alamat_pemohon"  value="<?php echo e($alamat_pemohon); ?>" placeholder="Masukan Alamat Pemohon " type="text">
                                    <?php if($errors->has('alamat_pemohon')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('telp_pemohon')): ?> has-error <?php endif; ?>">
                                    <label>Nomor Telepon Pemohon</label>
                                    <input class="form-control" id="telp_pemohon" name="telp_pemohon"  value="<?php echo e($telp_pemohon); ?>" placeholder="Masukan Telepon Pemohon " type="text">
                                    <?php if($errors->has('telp_pemohon')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if($errors->has('email_pemohon')): ?> has-error <?php endif; ?>">
                                    <label>Alamat Email</label>
                                    <input class="form-control" id="email_pemohon" name="email_pemohon"  value="<?php echo e($email_pemohon); ?>" placeholder="Masukan Email Pemohon" type="text">
                                    <?php if($errors->has('email_pemohon')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('pekerjaan_pemohon')): ?> has-error <?php endif; ?>">
                                    <label>Pekerjaan Pemohon</label>
                                    <input class="form-control" id="pekerjaan_pemohon" name="pekerjaan_pemohon"  value="<?php echo e($pekerjaan_pemohon); ?>" placeholder="Masukan Pekerjaan Pemohon" type="text">
                                    <?php if($errors->has('pekerjaan_pemohon')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                  <label><input type="checkbox" value="1" id="kuasa_pemohon" name="kuasa_pemohon" <?php if(old('kuasa_pemohon')): ?> checked="checked" <?php endif; ?>>Permohonan Dikuasakan Kepada</label>
                                </div>
                            </div>
                            <div id="panel-kuasa">
                                <div class="col-md-6">
                                    <div class="form-group <?php if($errors->has('nama_kuasa')): ?> has-error <?php endif; ?>">
                                        <label>Nama Penerima Kuasa</label>
                                        <input class="form-control" name="nama_kuasa"  value="<?php echo e($nama_kuasa); ?>" placeholder="Masukan Nama" type="text">
                                        <?php if($errors->has('nama_kuasa')): ?>
                                        <span class="help-block">Kolom Ini Harus Diisi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group <?php if($errors->has('alamat_kuasa')): ?> has-error <?php endif; ?>">
                                        <label>Alamat</label>
                                        <input class="form-control" name="alamat_kuasa"  value="<?php echo e($alamat_kuasa); ?>" placeholder="Masukan Alamat  " type="text">
                                        <?php if($errors->has('alamat_kuasa')): ?>
                                        <span class="help-block">Kolom Ini Harus Diisi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?php if($errors->has('telp_kuasa')): ?> has-error <?php endif; ?>">
                                        <label>Nomor Telepon</label>
                                        <input class="form-control" name="telp_kuasa"  value="<?php echo e($telp_kuasa); ?>" placeholder="Masukan Telepon  " type="text">
                                        <?php if($errors->has('telp_kuasa')): ?>
                                        <span class="help-block">Kolom Ini Harus Diisi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?php if($errors->has('pekerjaan_kuasa')): ?> has-error <?php endif; ?>">
                                        <label>Pekerjaan </label>
                                        <input class="form-control" name="pekerjaan_kuasa"  value="<?php echo e($pekerjaan_kuasa); ?>" placeholder="Masukan Pekerjaan " type="text">
                                        <?php if($errors->has('pekerjaan_kuasa')): ?>
                                        <span class="help-block">Kolom Ini Harus Diisi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <h3 class="col-md-12" style="margin-top: 20px;">B. Informasi Yang Dimohonkan</h3>
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('informasi_tujuan')): ?> has-error <?php endif; ?>">
                                    <label>Informasi Yang Diperlukan</label>
                                    <textarea  name="informasi_diperlukan" placeholder="Masukan Rincian Informasi yang Diperlukan"
                                    class="form-control" rows="5"><?php echo e($informasi_diperlukan); ?></textarea>
                                    <?php if($errors->has('informasi_diperlukan')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group <?php if($errors->has('informasi_tujuan')): ?> has-error <?php endif; ?>">
                                    <label>Tujuan Penggunaan Informasi</label>
                                    <textarea class="form-control" id="informasi_tujuan" name="informasi_tujuan"  placeholder="Masukan Tujuan Penggunaan Informasi"><?php echo e($informasi_tujuan); ?></textarea> 
                                    <?php if($errors->has('informasi_tujuan')): ?>
                                    <span class="help-block">Kolom Ini Harus Diisi</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="col-md-12" style="margin-top: 20px;">C. Cara Memperoleh dan Mendapatkan Informasi</h3>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Pilih Cara Memperoleh Informasi </label>
                                    <?php if($errors->has('cara_memperoleh')): ?> 
                                    <small style="color:#a24552 ;">Anda Belum Memilih </small>
                                    <?php endif; ?>
                                    <div class="controls">
                                    <?php
                                        $cara1 = DB::table('cara_memperoleh')->get();
                                    ?>
                                    <?php foreach($cara1 as $al): ?>
                                      <label class="radio-inline"><input type="radio" name="cara_memperoleh" 
                                      value="<?php echo e($al->nama); ?>" <?php if($cara_memperoleh==$al->nama): ?> checked="checked" <?php endif; ?> ><?php echo e($al->nama); ?></label><br>
                                    <?php endforeach; ?>
                                  </div>
                                  </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Pilih Cara Mendapatkan Informasi </label>
                                    <?php if($errors->has('cara_mendapatkan')): ?> 
                                    <small style="color:#a24552 ;">Anda Belum Memilih </small>
                                    <?php endif; ?>
                                    <div class="controls">
                                    <?php
                                        $cara1 = DB::table('cara_mendapatkan')->get();
                                    ?>
                                    <?php foreach($cara1 as $al): ?>
                                      <label class="radio-inline"><input type="radio" name="cara_mendapatkan" 
                                      value="<?php echo e($al->nama); ?>" <?php if($cara_mendapatkan==$al->nama): ?> checked="checked" <?php endif; ?> ><?php echo e($al->nama); ?></label><br>
                                    <?php endforeach; ?>
                                  </div>
                                  </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 5px;">&nbsp;</div>
                            <div class="col-md-4 <?php if($errors->has('captcha')): ?> has-error <?php endif; ?>">
                                <div class="form-group " >
                                <input class="form-control" name="captcha"  
                                 placeholder="Masukan Kode Captcha" type="text" >
                                  <?php if($errors->has('captcha')): ?>
                                    <span class="help-block">Kode Captcha Salah!</span>
                                  <?php endif; ?>
                                </div>    
                            </div>
                            <div class="col-md-3">
                                 <p><?php echo Captcha::img('flat');?></p>
                            </div>              
                        </fieldset>
                        <p>&nbsp;</p>
                        <div>
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">
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
             <?php if($errors->has()): ?>
                Notify.showAlert('<b>Terjadi Kesalahan</b>,  Periksa Inputan Form');
             <?php endif; ?>
             
             $("#panel-kuasa").hide();
             <?php if($kuasa_pemohon == 1): ?> 
                $("#panel-kuasa").show();
             <?php endif; ?>
             $("#kuasa_pemohon").change(function() {
                if(this.checked) {
                   $("#panel-kuasa").show();
                }else{
                    $("#panel-kuasa").hide()
                }
            });
            
            $("#cek-permohonan").on("click",function(){
                if($("#nomor_permohonan").val()=="") return;
                
                $.get("<?php echo e(URL::to('admin/permohonan/nomor')); ?>/" + $("#nomor_permohonan").val(),function(data){

                    $("#nama_pemohon").val(data.nama_pemohon);
                    $("#alamat_pemohon").val(data.alamat);
                    $("#telp_pemohon").val(data.telepon);
                    $("#pekerjaan_pemohon").val(data.pekerjaan);
                    $("#informasi_tujuan").val(data.informasi_tujuan);
                })
            })
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>